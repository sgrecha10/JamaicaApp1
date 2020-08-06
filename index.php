<?
        /***
         
         *    PageMaker ver. 1.0.
              
         *    1. Веб-доступ, построчные действия:    
         *          https://api.movens.ru/jamaica/app1/index.php
         *          https://movens.bitrix24.ru/marketplace/app/31/
         *          Левое меню в ЛК
                
         *    2. Запуск по SSH для массовой обработки строк с "защитой от дурака":
         *          php /home/h908208400/h908208400.nichost.ru/docs/jamaica/app1/index.php

         *    3. Скорость обработки задушена до 2 запросов/сек. Иначе вываливается ошибка 1C - не терзайте API, не более 2 зап/сек.

         *    4. При обновлении страницы можно изменить title. Url страницы при этом не изменится.

         *    5. Лаг 1C BITRIX. При обновлении страницы невозможно изменить поля keywords и description. 
         *    Эти поля не подлежат изменениям. Только через удаление и новое создание страницы, с изменением url соответственно.
         
         *    6. Лаг 1С BITRIX. Если при массовом создании страниц зайти в раздел ЛК "Сайт" -> "Подраздел", то страница 
         *    обрабатываемая в момент обновления подраздела получит картинку в подразделе "такой страницы не существует", 
         *    при этом со страницей все в порядке. Не исправляется никак, но и никак не мешает.
         
         *    7. Лаг 1C BITRIX. Ссылка на приложение в левом меню ЛК. Перерегистранция приложения не отменяет некоторые первоначальные настройки.
         *    Например, если сначала приложение установить с доступом из интерфейса, а затем поменять его настройки и доступ убрать - в левом меню 
         *    оно все равно остается. B есть еще парочка подобных не существенных мелочей. 
         

         
         ***
         
         *   PageMaker ver. 0.9 beta
            
         *   1. Страница управления:
         *       https://movens.bitrix24.ru/marketplace/app/27/
         *       или
                
         *   2. Для создания или обновления страницы нужно указть id нужной строки из списка "Страницы сайта". 
            
         *   3. Если из указанной строки страница ранее не создавалась, то будет создана новая. 
         *   Иначе, на странице будет полностью обновлен контент в соответствии с текущим состоянием строки таблицы (кроме названия)
            
         *   4. Новые страницы автоматически попадают в sitemap.xml и публикуются.
         *   
         *   5. Никогда не меняйте название страницы при внесении изменений в таблицу. 
         *   По этому полю генерируется URL, таким образом, если меняется название, то меняется и URL, а это значит - новая страница.
         *   Если требуется изменить название, создавайте новую строку в таблице и генерируйте новую страницу.
         *   Старую страницу можно удалить например.
            
         *   6. Т.к. не может быть нескольких страниц с одинаковым URL, и это очень важно, то отсутствие дублей проверяется на уровне 1C BITRIX. 
         *   Работает это так. Если попытаться добавить страницу с уже имеющимся названием (и значит - с таким же URL) то ошибок не будет, 
         *   но 1С автоматически добавит к концу URL цифровой счетчик. Это хорошо и изменить это невозможно. 
                        
         *   7. ВАЖНАЯ ОСОБЕННОСТЬ 1C BITRIX из п.6 
         *   При удалении любой страницы сайта любым способом, она не удаляется в прямом смысле, а только скрывается. 
         *   Но, почему то, 1С BITRIX учитывает такие страницы при определении уникальности URL. 
         *   Это значит, что если была создана страница с адресом http://.../slava/ а затем она была удалена и снова 
         *   создана - она автоматически получит адрес http://.../slava1/
         *   Я не нашел способа после удаления страницы снова создать страницу с первоначальным адресом.
         *   И вот это уже не очень хорошо, и нужно учитывать такой косяк.
         
         */


define("SITE_ID", 23); // 13
define("FOLDER_ID", 1023); //643
define("IDBLOCK_ID", 123); // кажется, это айди списка


require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/inc/functions.inc');


function main(){
    global $count, $count_update, $count_create;
    $count = $count_update = $count_create = 0; // счетчик страниц для массовой обработки
    
    // Определяем, как запущен скрипт
    $sapi = php_sapi_name();
    
    if ($sapi=='cli'){
        //Консоль
        echo "\n\r===============================================================\n\r";
        echo "Для обработки ВСЕХ страниц введите 'massive attack': ";
        echo "\n\r===============================================================\n\r";
        $input = fgets(STDIN);
        if (trim($input) == 'massive attack'){
            //echo "Понеслась!\n\r";
            $start_time = microtime(true);
            
            $start = 1; // начальное значение строки в списке
            while ($start){
                // Передает начальное значение для выборки из списка, получает 50 строк, обрабатывает их, затем передает последнее значение и получает следующие 50 строк.
                $start = getElements($start);
            }
            
            $total_sec = round(microtime(true) - $start_time);
            $minutes = floor($total_sec / 60);
            $hours = floor($minutes / 60);
            $seconds = $total_sec - ($minutes * 60);
            $minutes = $minutes - ($hours * 60);

            echo "\n\rTime: ".str_pad($hours, 2, "0", STR_PAD_LEFT).':'.str_pad($minutes, 2, "0", STR_PAD_LEFT).':'.str_pad($seconds, 2, "0", STR_PAD_LEFT);
            echo "\n\rTotal: ".$count." rows";
            echo "\n\rUpdate: ".$count_update." pages";
            echo "\n\rCreate: ".$count_create." pages\n\r\n\r";
        }

    }
    elseif (substr($sapi,0,6)=='apache'){
        // Запуск через apache

        $row_id = intval($_POST['id_row']);
        
        if ($row_id){
            // Получаем данные из таблицы
            $result = CRest::call(
                        'lists.element.get', 
                        [
                            'IBLOCK_TYPE_ID' => 'lists', 
                            'IBLOCK_ID' => IDBLOCK_ID, 
                            'ELEMENT_ID' => $row_id,
                        ]
            );

            CRest::setLog(
                        [
                            'IBLOCK_TYPE_ID' => 'lists', 
                            'IBLOCK_ID' => IDBLOCK_ID, 
                            'ELEMENT_ID' => $row_id,
                            'result' => $result,
                        ],
                        'lists.element.get'
            );
        
            $out = choiceAction($result['result'][0]);
        }
       
        require (__DIR__.'/inc/cgiui.inc');
    } 
}

main();
?>