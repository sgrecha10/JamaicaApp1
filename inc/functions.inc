<?

// эта функция для перевода урлов в транслит
function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',    'ы' => 'y',   'ъ' => '',
        'э' => 'eh',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'Eh',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}


// перевод урлов в транслит
function str2url($str) {
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на ""
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    $str=preg_replace("/--+/","-",$str); // убираем повторяющиеся тире
    // удаляем начальные и конечные '-'
    $str = trim($str, "-");
    return $str;
}


function getItemData($data){
    // Распарсиваем данные из строки
    $res = array();
       
    $res['id'] = $data['ID']; // Id строки таблицы
    $res['name'] = $data['NAME']; // Name
    $res['description'] = end($data['PROPERTY_1027'])['TEXT']; // Описание
    $res['keywords'] = end($data['PROPERTY_1029']); // Ключевые слова    
    
    $res['soc_header'] = end($data['PROPERTY_1033']); // Соц название. 
    $res['soc_text'] = end($data['PROPERTY_1037'])['TEXT']; // Соц описание.  
    
    $res['block_1_header'] = end($data['PROPERTY_1039']); // Блок 1 Заголовок
    $res['block_1_text'] = end($data['PROPERTY_1041'])['TEXT']; // Блок 1 Текст
        
    $res['block_2_header'] = end($data['PROPERTY_1053']); // Блок 2 Заголовок
    $res['block_2_subheader'] = end($data['PROPERTY_1055']); // Блок 2 Подзаголовок
        
    $res['block_3_html'] = end($data['PROPERTY_1057'])['TEXT']; // Блок 3 HTML
        
    $res['block_4_header'] = end($data['PROPERTY_1059']); // Блок 4 Заголовок
    $res['block_4_text'] = end($data['PROPERTY_1061']); // Блок 4 Текст
    $res['block_4_button'] = end($data['PROPERTY_1065']); // Блок 4 Кнопка
    $res['block_4_link'] = end($data['PROPERTY_1067']); // Блок 4 Ссылка
        
    $res['block_5_header'] = end($data['PROPERTY_1069']); // Блок 5 Заголовок
    $res['block_5_subheader'] = end($data['PROPERTY_1071']); // Блок 5 Подзаголовок
    $res['block_5_text'] = end($data['PROPERTY_1073'])['TEXT']; // Блок 5 Текст
        
    $res['block_6_header_1'] = end($data['PROPERTY_1077']); // Блок 6 Заголовок 1
    $res['block_6_text_1'] = end($data['PROPERTY_1079'])['TEXT']; // Блок 6 Текст 1
    $res['block_6_header_2'] = end($data['PROPERTY_1081']); // Блок 6 Заголовок 2
    $res['block_6_text_2'] = end($data['PROPERTY_1085'])['TEXT']; // Блок 6 Текст 2
    $res['block_6_header_3'] = end($data['PROPERTY_1087']); // Блок 6 Заголовок 3
    $res['block_6_text_3'] = end($data['PROPERTY_1089'])['TEXT']; // Блок 6 Текст 3
    $res['block_6_header_4'] = end($data['PROPERTY_1093']); // Блок 6 Заголовок 4
    $res['block_6_text_4'] = end($data['PROPERTY_1095'])['TEXT']; // Блок 6 Текст 4
        
    $res['block_7_header'] = end($data['PROPERTY_1097']); // Блок 7 Заголовок
    $res['block_7_text'] = end($data['PROPERTY_1099'])['TEXT']; // Блок 7 Текст
        
    return $res;
}


function setTemlates($data){
    // Заменяем переменные в шаблоне
    $vars = $data;
    require (__DIR__.'/vars.inc');
    $block_array = array(
            '08.4.fix_title_and_text' => $content1,
            '04.1.one_col_fix_with_title' => $content2,
            'html' => $content3,
            '13.1.one_col_fix_text_and_button' => $content4,
            '04.7.one_col_fix_with_title_and_text_2' => $content5,
            '08.2.two_cols_fix_title_and_text' => $content6,
            '26.separator' => $content7,
            '33.12.form_2_light_right_text' => $content8,
    );
    
    return $block_array;
}



function updatePage($data, $page_id){
    // Обновляем страницу
    
    // Получаем выборку из списка
    $vars = getItemData($data);
    $title = $vars['name'];
    $description = html_entity_decode($vars['description']);
      
    // Обновляем шаблонные переменные
    $block_array = setTemlates($vars);
    //echo $block_array['08.4.fix_title_and_text'];

    // 1. Распубликовать страницу
    $result = CRest::call(
            'landing.landing.unpublic', 
            [
                'lid' => $page_id
            ]
    );

    usleep(500000); // 0.5 сек.

    // 1.1. Обновить поля страницы (ADDITIONAL_FIELDS -  не обновляются)
    $fields = array(
            'TITLE' => $title, 
            'DESCRIPTION' => $description,
    );


    $result = CRest::call(
            'landing.landing.update', 
            [
                'lid' => $page_id,
                'fields' => $fields,
            ]
    );
    
    usleep(500000); // 0.5 сек.
    
    CRest::setLog(
			[
                'lid' => $page_id,
				'fields' => $fields,
				'result' => $result,
			],
			'landing.landing.add'
	);


    // 2. Удалить все блоки
    $result = CRest::call(
            'landing.block.getlist', 
            [
                'lid' => $page_id,
                'params' => 
                    [
                        'edit_mode' => 1
                    ]
            ]
    );
    
    usleep(500000); // 0.5 сек.
    
    CRest::setLog(
                [
                    'lid' => $page_id,
				    'result' => $result,
                ],
                'landing.block.getlist'
    );

    $arr_blocks = array();
    foreach($result['result'] as $arr) $arr_blocks[] = $arr['id'];
 
    foreach($arr_blocks as $block_id){
        $result = CRest::call(
                'landing.landing.deleteblock', 
                [
                    'lid' => $page_id, 
                    'block' => $block_id
                ]
        );
        usleep(500000); // 0.5 сек.
    }
    
    // 3. Добавить блоки на страницу
    $id_block = '';
    foreach($block_array as $key => $val){
   
        $fields = array(
                'CODE' => $key,
                'AFTER_ID' => $id_block,
                'CONTENT' => $val,
        );
            
        $result = CRest::call(
                'landing.landing.addblock', 
                [
                    'lid' => $page_id, 
                    'fields' => $fields
                ]
        );
            
        CRest::setLog(
                [
				    'fields' => $fields,
				    'result' => $result,
                ],
                'landing.landing.addblock'
        );
            
        $id_block = $result['result'];
        usleep(500000); // 0.5 сек.
   }

    // 3.1 Для блока '33.12.form_2_light_right_text' устанавливаем аттрибут data-b24form="37|bvr7kg" Это переключает последний блок из состояния "Авиабилеты" в состояние "ЖД билеты"
    // Т.к. мы не знаем как получить по этому идентификатору его block_id, но зато знаем что этот блок последний на странице - нам очень повезло. Просто меняем этот аттрибут у последнего блока.
    //echo $id_block;
    $result = CRest::call(
            'landing.block.updateattrs', 
            [
                'lid' => $page_id,
                'block' => $id_block,
                'data' => 
                    [
                        '.bitrix24forms' =>
                            [
                                'data-b24form' => '37|bvr7kg'
                            ]
                    ]
            
            ]
    ); 
    
    usleep(500000); // 0.5 сек.
    
    // 4. Опубликовать страницу
    $result = CRest::call('landing.landing.publication', ['lid' => $page_id]); 
        
    return $result;
}

function createPage($data, $row_id){
    // Создаем страницу
    // Получаем выборку из списка
    $vars = getItemData($data);
    $title = $vars['name'];
    $description = html_entity_decode($vars['description']);
    $keywords = html_entity_decode($vars['keywords']);
    $code = str2url($title);    
    
    $soc_header = $vars['soc_header'];
    $soc_text = $vars['soc_text'];
    //echo $soc_header."<br>".$soc_text;
    
    // Обновляем шаблонные переменные
    $block_array = setTemlates($vars);
    //echo $block_array['08.4.fix_title_and_text'];
    
    $additional_fields = array(
            'METAMAIN_USE' => 'Y',
            'METAMAIN_DESCRIPTION' => $description,
            'METAMAIN_KEYWORDS' => $keywords,
            'METAOG_TITLE' => $soc_header,
            'METAOG_DESCRIPTION' => $soc_text,
    );

    $fields = array(
            'TITLE' => $title, 
            'CODE' => $code, 
            'DESCRIPTION' => $description,
            'SITE_ID' => SITE_ID, 
            'SITEMAP' => 'Y', 
            'FOLDER_ID' => FOLDER_ID, 
            'XML_ID' => $row_id,
            'ADDITIONAL_FIELDS' => $additional_fields,
    );
        

        
    $result = CRest::call(
            'landing.landing.add', 
            [
                'fields' => $fields
            ]
    );
    
    usleep(500000); // 0.5 сек.
    
    CRest::setLog(
			[
				'fields' => $fields,
				'result' => $result,
			],
			'landing.landing.add'
	);

    $lid = $result['result'];

    // Создаем блоки на странице    
    $id_block = '';
    foreach($block_array as $key => $val){
            
        $fields = array(
                'CODE' => $key,
                'AFTER_ID' => $id_block,
                'CONTENT' => $val,
        );
            
        $result = CRest::call(
                'landing.landing.addblock', 
                [
                    'lid' => $lid, 
                    'fields' => $fields
                ]
        );
            
        CRest::setLog(
                [
				    'fields' => $fields,
				    'result' => $result,
                ],
                'landing.landing.addblock'
        );
            
        $id_block = $result['result'];
        usleep(500000); // 0.5 сек.
    }

    // 3.1 Для блока '33.12.form_2_light_right_text' устанавливаем аттрибут data-b24form="37|bvr7kg" Это переключает последний блок из состояния "Авиабилеты" в состояние "ЖД билеты"
    // Т.к. мы не знаем как получить по этому идентификатору его block_id, но зато знаем что этот блок последний на странице - нам очень повезло. Просто меняем этот аттрибут у последнего блока.
    $result = CRest::call(
            'landing.block.updateattrs', 
            [
                'lid' => $lid,
                'block' => $id_block,
                'data' => 
                    [
                        '.bitrix24forms' =>
                            [
                                'data-b24form' => '37|bvr7kg'
                            ]
                    ]
            
    ]);
    
    usleep(500000); // 0.5 сек.
    
    // Публикуем страницу. На публикацию опубликованных страниц ошибку не выдает. необходимо что бы обновить sitemap.xls
    $result = CRest::call(
            'landing.landing.publication', 
            [
                'lid' => $lid
            ]
    );
    
    usleep(500000); // 0.5 сек.
    
    CRest::setLog(
            [
                'lid' => $lid,
                'result' => $result,
            ],
            'landing.landing.publication'
    );


    return $result;
}




function choiceAction($data){
    global $count, $count_update, $count_create;
    $count++;
    
    $row_id = $data['ID'];
    
    // Получаем $page_id для страницы XML_ID = $row_id
    $result = CRest::call(
            'landing.landing.getList', 
            [
                'params' => 
                    [
                        'select' => 
                            [
                                'ID'
                            ],
                        'filter' => 
                            [
                                'XML_ID' => $row_id,
                                'SITE_ID' => SITE_ID,
                            ]
                    ]
            ]
    );
    
    usleep(500000); // 0.5 сек.
    
    $page_id = @$result['result'][0]['ID'];

    $out[0] = $count;
    $out[1] = $row_id;

    // Выясняем, что будем делать
    if($page_id){
        // updatePage
        $out[2] = 'updated';
        $out[3] = updatePage($data, $page_id);
        $count_update ++;
                
    }else{
        // createPage
        $out[2] = 'created';
        $out[3] = createPage($data, $row_id);
        $count_create ++;
    }
    return $out;
}


function getElements($start){
    // Получает и обрабатывает максимум 50 значений
    $result = CRest::call(
                'lists.element.get', 
                    [
                        'IBLOCK_TYPE_ID' => 'lists', 
                        'IBLOCK_ID' => IDBLOCK_ID, 
                        'ELEMENT_ORDER' => 
                            [
                                'ID' => 'ASC'
                            ], 
                        'FILTER' => 
                            [
                                '>ID' => $start
                            ]
    ]);
   
   usleep(500000); // 0.5 сек.
   
    $i = 0;
    while (1){
        if (!@$result['result'][$i]['ID']) break;
        else{
            $res = $result['result'][$i]['ID'];
            $out = choiceAction($result['result'][$i]);
            
            echo "\n\r---------------------------------------------------------------\n\r";
            echo "| ".str_pad($out[0], 10)."| ".str_pad($out[1], 15)."| ".str_pad($out[2], 10);
        }
        $i++;
        usleep(500000); // 0.5 сек.
    }
    echo "\n\r---------------------------------------------------------------\n\r";
    return @$res;
}

?>