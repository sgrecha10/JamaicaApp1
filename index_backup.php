<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Quick start. Local server-side application</title>
</head>
<body>
    <h1>Привет</h1>
	<div id="name">
		<?php
		require_once (__DIR__.'/crest.php');

		#$result = CRest::call('user.current');
        #print_r($result);
        #foreach($result[result] as $key=>$val) echo $key." ".$val."<br>";
        #echo $result['result']['NAME'].' '.$result['result']['LAST_NAME'];

		#$result = CRest::call('landing.site.getList');
        #print_r($result);
        #foreach($result[result][2] as $key=>$val) echo $key." ".$val."<br>";
        
        #echo "<br>";
        
        #$result = CRest::call('landing.site.getPublicUrl', ['id' => 13]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[time] as $key=>$val) echo $key." ".$val."<br>";        

        #echo "<br>";

        
        #$result = CRest::call('landing.landing.getList', ['params' => ['filter' => ['SITE_ID' => 13],]]);
        
        #print_r($result);
        #echo $result[result];
        #foreach($result[result][14] as $key=>$val) echo $key." ".$val."<br>";  


        #$result = CRest::call('landing.landing.copy', ['lid' => 657, 'toSiteId' => 13, 'toFolderId' => 643]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result][13] as $key=>$val) echo $key." ".$val."<br>";  

        #return page_id = 657? 659

        #$result = CRest::call('landing.landing.publication', ['lid' => 659]); // на публикацию опубликованных страниц ошибку не выдает. необходимо что бы обновить sitemap.xls
        #$result = CRest::call('landing.landing.unpublic', ['lid' => 659]);
        #print_r($result);


        #$result = CRest::call('landing.landing.update', ['lid' => 659, 'fields' => ['SITEMAP' => 'Y', 'CODE' => 'testur243']]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result][13] as $key=>$val) echo $key." ".$val."<br>";          


        #$result = CRest::call('landing.block.getlist', ['lid' => 659]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result][1] as $key=>$val) echo $key." ".$val."<br>";     


        
        #$result = CRest::call('landing.block.getcontent', ['lid' => 659, 'block' => 10327, 'editMode' => 0, 'params' => ['wrapper_show' => 0]]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result] as $key=>$val) echo $key." ".$val."<br>";         


        #$result = CRest::call('landing.block.getmanifest', ['lid' => 659, 'block' => 10327, 'params' => ['editMode' => 0]]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result] as $key=>$val) echo $key." ".$val."<br>";       

        #$result = CRest::call('landing.landing.addblock', ['lid' => 659, 'fields' => ['CODE' => '15.social']]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result] as $key=>$val) echo $key." ".$val."<br>";    


        #$result = CRest::call('landing.block.updatenodes', ['lid' => 659, 'block' => 10333, 'data' => ['.landing-block-node-text' => 'А вот новый прекрасный текст!']]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result][13] as $key=>$val) echo $key." ".$val."<br>";        
        
        
        
        #$result = CRest::call('landing.block.updatecontent', ['lid' => 659, 'block' => 10325, 'content' => '<h1>Это новый ГИГАНТСКИЙ ЗАГОЛОВОК!</h1>']);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result][13] as $key=>$val) echo $key." ".$val."<br>";  

/*--Ниже списки--*/

        #$result = CRest::call('lists.get', ['IBLOCK_TYPE_ID' => 'lists']);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result][20] as $key=>$val) echo $key." ".$val."<br>";    

 
        $i = 0;

        $result = CRest::call('lists.element.get', ['IBLOCK_TYPE_ID' => 'lists', 'IBLOCK_ID' => 123, 'ELEMENT_ID' => 184387]);
        #print_r($result);
        #echo $result[result];
        foreach($result['result'][$i] as $key=>$val) echo $key." ".$val."<br>";  
        
        echo "<br>";
        print($result['result'][$i]['ID']); // ID    
        echo "<br>";
        /* 
        print($result['result'][$i]['NAME']); // NAME   
        echo "<br>";
        
        #print($result[result][$i][PROPERTY_1027][309271][TEXT]); // Описание
        print(end($result['result'][$i]['PROPERTY_1027'])['TEXT']); // Описание
        echo "<br>";
        #print($result[result][$i][PROPERTY_1029][309273]); // Ключевые слова
        #print($result[result][$i][PROPERTY_1029][309597]); // Ключевые слова $i = 1
        print_r(end($result['result'][$i]['PROPERTY_1029'])); // ключевые слова
        */
 
        echo "<br>";
        #print($result['result'][$i]['PROPERTY_1033']); // Соц название.     
        print(end($result['result'][$i]['PROPERTY_1033'])); // Соц название.     
        echo "<br>";
 
 
        echo "<br>";
        #print($result[result][$i][PROPERTY_1037][309275][TEXT]); // Соц описание.     
        print(end($result['result'][$i]['PROPERTY_1037'])['TEXT']); // Соц описание.     
        echo "<br>";
        
        /*
        #print($result[result][$i][PROPERTY_1039][309285]); // Блок 1 Заголовок
        print(end($result['result'][$i]['PROPERTY_1039'])); // Блок 1 Заголовок
        echo "<br>";
        #print($result[result][$i][PROPERTY_1041][309277][TEXT]); // Блок 1 Содержание
        print(end($result['result'][$i]['PROPERTY_1041'])['TEXT']); // Блок 1 Содержание
        */

#echo "<br>";
#echo "<br>";

        #$result = CRest::call('lists.field.get', ['IBLOCK_TYPE_ID' => 'lists', 'IBLOCK_ID' => 123, 'FIELD_ID' => 'PROPERTY_1027']);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result]['S:HTML'] as $key=>$val) echo $key." ".$val."<br>";  





        // СОЗДАЕМ СТРАНИЦУ САЙТА
/*
        $site_id = 13;
        $title = 'Страница из функции';
        $code = 'newurlq';
        $folder_id = 643;
        
        
        $content1 = '
<section class="landing-block g-pb-80 js-animation animation-none g-pt-50" style="animation-duration: 1000ms; animation-play-state: running; animation-name: none;">
	<div class="landing-block-node-container container js-animation fadeIn" style="animation-duration: 1000ms; animation-play-state: running; animation-name: none;">
		<div class="landing-block-node-header u-heading-v2-4--bottom g-brd-primary g-mb-40">
			<h2 class="landing-block-node-title text-uppercase h1 u-heading-v2__title g-line-height-1_3 g-font-weight-600 g-mb-minus-10 g-text-break-word g-font-size-33">Билеты на поезд № <span style="font-weight: bold;">002Й</span>: <span style="font-weight: bold;">Москва </span>- <span style="font-weight: bold;">Казань</span></h2>
		</div>

		<div class="landing-block-node-text g-font-size-16"><p>Хотите приобрести билеты на поезд №<span style="font-weight: bold;">002Й </span>следующий по маршруту <span style="font-weight: bold;">Москва </span>– <span style="font-weight: bold;">Казань</span> на российских железных дорогах? Мы с радостью поможем вам в оформлении как индивидуального билета для одного пассажира, так и групповой билет для организованных групп пассажиров учитывая все особенности возрастной группы.&nbsp;</p><p>Поезд №<span style="font-weight: bold;">002Й</span> отправляется от станции «<span style="font-weight: bold;">Москва</span>» в <span style="font-weight: bold;">12:30</span> и прибывает на станцию «<span style="font-weight: bold;">Казань</span>» в <span style="font-weight: bold;">22:43</span> совершив <span style="font-weight: 700;">4&nbsp;</span>ост. во время своего маршрута, чье общей количество времени составляет примерно: <span style="font-weight: bold;">1 д. 6 ч. 34 м..</span>&nbsp;</p><p>Оформить билет на поезд <span style="font-weight: bold;">002Й </span>и оплатить его самостоятельно для одного пассажира вы можете с помощью онлайн фор мы представленной нижи, а та же вы можете обратиться к нам любым удобным для вас способом коммуникации представленный на сайте и мы сделаем это за вас предложив альтернативные варианты маршрута <span style="font-weight: bold;">Москва </span>– <span style="font-weight: bold;">Казань</span>, чтобы вы не упустили ничего важного.&nbsp;</p><p>Для оформления групповых билетов на поезд №<span style="font-weight: bold;">002й</span>: <span style="font-weight: bold;">Москва </span>– <span style="font-weight: bold;">Казань</span>, вам необходимо будет предоставить список пассажиров не более чем за 90 дней до отправления состава (шаблон списка для заполнения). Если это организованная группа пассажиров школьного возраста (до 17 лет), то согласно Санитарно-эпидемиологическим правилам <a href="#" target="_self">СП 2.5.3157 – 14</a>, детей нужно обеспечивать горячим питанием каждый 4 часа пути.&nbsp;</p><p>Мы уже не первый год занимается перевозками пассажиров по маршруту <span style="font-weight: bold;">Москва </span>– <span style="font-weight: bold;">Казань </span>и знает о деталях оформления билетов все, что необходимо знать для предоставления максимально качественной услуги. Позвоните нам по телефону +7 (495) 414-22-42 и наши специалисты ответят на все ваши вопросы.&nbsp;<br></p></div>
	</div>
</section>
        ';
        
        
        $content2 = '
<section class="landing-block js-animation g-pt-20 g-pb-20 g-bg-gray-light-v5 animation-none" style="animation-duration: 1000ms; visibility: hidden; animation-name: none; animation-play-state: paused;">
        <div class="container">
            <div class="landing-block-node-inner text-uppercase text-center u-heading-v2-4--bottom g-brd-primary">
                <h4 class="landing-block-node-subtitle h6 g-font-weight-800 g-font-size-12 g-letter-spacing-1 g-color-primary g-mb-20">Расписание поезда 002Й</h4>
                <h2 class="landing-block-node-title h1 u-heading-v2__title g-line-height-1_3 g-font-weight-600 g-mb-minus-10 g-font-size-30">Москва - Казань</h2>
            </div>
        </div>
</section>
        ';
        
        
        $content3 = '
<section class="landing-block g-pl-0 g-pr-0 g-bg-white g-pb-100 g-pt-50">
	<div class="html-block">
<div>Основной маршрут</div><table width="100%"><tbody><tr><th>Станция</th><th><h4>Прибытие</h4></th><th>Стоянка</th><th><h4>Отправление</h4></th><th><h4>Время в пути</h4></th></tr><tr><td>
 Москва Казанская
 </td><td></td><td></td><td>20:50</td><td></td></tr><tr><td>
 Муром 1
 </td><td>01:02</td><td>2 м</td><td>01:04</td><td>4 ч 12 м</td></tr><tr><td>
 Канаш
 </td><td>05:55</td><td>2 м</td><td>05:57</td><td>9 ч 3 м</td></tr><tr><td>
 Казань Пасс
 </td><td>08:00</td><td></td><td></td><td>11 ч 6 м</td></tr></tbody></table>
</div></section>
        ';
        
        
        $content4 = '
<section class="landing-block g-bg-gray-light-v5 g-pt-40 g-pb-40">
	<div class="container">
		<div class="landing-block-node-container row g-flex-centered align-items-end">
			<div class="landing-block-node-button-container text-left col-4 js-animation slideInLeft" style="animation-duration: 1000ms; animation-play-state: running; animation-name: none;">
				<a class="landing-block-node-button landing-semantic-link-image-medium btn btn-sm text-uppercase u-btn-primary rounded-0 g-px-15 font-weight-bold g-mb-0 g-brd-10" href="https://event.movens.ru/preview/3bd0ccae227cd9dc80b53f2f313e11b5/info/map/" target="_popup">Купить билет онлайн</a>
			</div>
			<div class="landing-block-node-text-container text-right col-8 js-animation slideInRight" style="animation-duration: 1000ms; animation-play-state: running; animation-name: none;">
				<h6 class="landing-block-node-title landing-semantic-text-medium h6 g-mb-0 font-weight-bold">Отдел групповых ЖД билетов</h6>
				<div class="landing-block-node-text landing-semantic-text-small g-font-size-14">+7 (495) 414-22-42, <span style="color: rgb(229, 57, 53);">103</span></div>
			</div>
		</div>
	</div>
</section>
        ';
        
        
        
        $content5 = '
<section class="landing-block landing-semantic-background-color js-animation g-pb-20 g-bg-main animation-none g-pt-100 animated" style="animation-duration: 1000ms; animation-play-state: running;">

	<div class="container text-center g-max-width-800">

		<div class="landing-block-node-inner text-uppercase u-heading-v2-4--bottom g-brd-primary">
			<h4 class="landing-block-node-subtitle landing-semantic-subtitle-medium-primary font-weight-bold g-font-size-12 g-color-primary g-mb-15">Поезд №002Й Москва - Казань</h4>
			<h2 class="landing-block-node-title landing-semantic-title-medium u-heading-v2__title g-line-height-1_1 font-weight-bold g-font-size-40 g-color-black g-mb-minus-10">Узнать больше</h2>
		</div>

		<div class="landing-block-node-text landing-semantic-text-medium g-pb-1 g-mb-auto g-color-main">Вас интересуют дополнительные услуги по поезду 002Й Москва - Казань? Тогда, рекомендуем ознакомиться с представленной ниже информации или просто обраться в наше агентство и наши специалисты объяснят вам все в режиме онлайн.</div>
	</div>

</section>
        ';
        
        
        $content6 = '
<section class="landing-block g-pb-100 g-pt-20">
	<div class="container">
		<div class="row landing-block-inner"><div class="landing-block-card js-animation fadeIn col-lg-6 g-mb-40 g-mb-0--lg" style="animation-duration: 1000ms; visibility: hidden; animation-name: none; animation-play-state: paused;">
				<div class="landing-block-card-header text-uppercase u-heading-v2-4--bottom g-brd-primary g-mb-40">
					<h4 class="landing-block-node-subtitle landing-semantic-subtitle-small h6 font-weight-bold g-font-size-12 g-letter-spacing-1 g-color-primary g-mb-20"> </h4>
					<h2 class="landing-block-node-title landing-semantic-title-medium h1 u-heading-v2__title g-line-height-1_3 font-weight-bold g-text-break-word g-font-size-35 g-mb-minus-10">Групповые билеты</h2>
				</div>

				<div class="landing-block-node-text landing-semantic-text-medium g-mb-50"><p>Если вам нужно перевести организованную группу детей или взрослых на поезде 002Й, то вам вам нужно заключить договор с Российскими Железными Дорогами и начать это желательно заблаговременно, так как согласование в большинстве случаев длится долго.</p><p>Мы давно сотрудничаем с групповым отделом РЖД и знаем какие документы и как должны быть заполнены, чтобы заявку на поездку Москва - Казань, рассмотрели оперативно.</p></div>
			</div><div class="landing-block-card js-animation fadeIn col-lg-6 g-mb-40 g-mb-0--lg" style="animation-duration: 1000ms; visibility: hidden; animation-name: none; animation-play-state: paused;">
				<div class="landing-block-card-header text-uppercase u-heading-v2-4--bottom g-brd-primary g-mb-40">
					<h4 class="landing-block-node-subtitle landing-semantic-subtitle-small h6 font-weight-bold g-font-size-12 g-letter-spacing-1 g-color-primary g-mb-20"> </h4>
					<h2 class="landing-block-node-title landing-semantic-title-medium h1 u-heading-v2__title g-line-height-1_3 font-weight-bold g-text-break-word g-font-size-35 g-mb-minus-10">Организация питания</h2>
				</div>

				<div class="landing-block-node-text landing-semantic-text-medium g-mb-50"><p>Для организованный детский групп в поезде 002Й&nbsp; действуют правила СанПиН (СП 2.5.3157-14) согласно которым, детей школьного возраста необходимо обеспечивать горячим питанием на протяжении всего маршрута Москва - Казань.</p><p>Это обязательное требование к перевозки организованных детских групп в поездах дальнего следования и без договора на питание, вам просто не продадут билеты на поезд 002Й.</p></div>
			</div><div class="landing-block-card js-animation fadeIn col-lg-6 g-mb-40 g-mb-0--lg" style="animation-duration: 1000ms; visibility: hidden; animation-name: none; animation-play-state: paused;">
				<div class="landing-block-card-header text-uppercase u-heading-v2-4--bottom g-brd-primary g-mb-40">
					<h4 class="landing-block-node-subtitle landing-semantic-subtitle-small h6 font-weight-bold g-font-size-12 g-letter-spacing-1 g-color-primary g-mb-20"> </h4>
					<h2 class="landing-block-node-title landing-semantic-title-medium h1 u-heading-v2__title g-line-height-1_3 font-weight-bold g-text-break-word g-font-size-35 g-mb-minus-10">Дополнительные вагоны</h2>
				</div>

				<div class="landing-block-node-text landing-semantic-text-medium g-mb-50">В разгар сезона некоторым группам путешественников может не хватить мест в поезде 002Й Москва - Казань, в таких случаях РЖД может пристегнуть дополнительные вагоны к составу поезда, но для этого нужно подготовить соответствующий комплект документов.&nbsp;<p></p><p>Наши специалисты в кротчайшие сроки соберут все необходимое документы для подачи заявки в Российские Железные Дорогие.</p><p></p></div>
			</div><div class="landing-block-card js-animation fadeIn col-lg-6 g-mb-40 g-mb-0--lg" style="animation-duration: 1000ms; visibility: hidden; animation-name: none; animation-play-state: paused;">
				<div class="landing-block-card-header text-uppercase u-heading-v2-4--bottom g-brd-primary g-mb-40">
					<h4 class="landing-block-node-subtitle landing-semantic-subtitle-small h6 font-weight-bold g-font-size-12 g-letter-spacing-1 g-color-primary g-mb-20"> </h4>
					<h2 class="landing-block-node-title landing-semantic-title-medium h1 u-heading-v2__title g-line-height-1_3 font-weight-bold g-text-break-word g-font-size-35 g-mb-minus-10">Встреча пассажиров</h2>
				</div>

				<div class="landing-block-node-text landing-semantic-text-medium g-mb-50"><p>Если вам необходимо встретить одного илил группу пассажиров поезда 002Й Москва - Казань, то мы с радостью поможем вам в этом, предложим услугу встречи пассажиров на вокзале.</p><p>Мы обеспечить любым необходимым автотранспортом, чтобы перевести пассажиров от вокзала до места назначения. В нашем арсенале как легковые автомобили так и туристические автобусы, где за умещаются до 72 человек.</p></div>
			</div></div>
	</div>
</section>
        ';
        
        $content7 = '
<section class="landing-block g-pt-10 g-pb-10">

        <hr class="landing-block-line landing-semantic-border my-0 g-brd-gray-dark-v1">

</section>
        ';
        
        
        $content8 = '
<section class="g-pos-rel landing-block text-center g-pb-100 g-pt-100">

	<div class="container">

		<div class="landing-block-form-styles" hidden="">
			<div class="g-bg-transparent h1 g-color-white g-brd-none g-pa-0" data-form-style-wrapper-padding="1" data-form-style-bg="1" data-form-style-bg-content="1" data-form-style-bg-block="1" data-form-style-header-font-size="1" data-form-style-main-font-weight="1" data-form-style-button-font-color="1" data-form-style-border-block="1">
			</div>
			<div class="g-bg-primary g-color-primary g-brd-primary" data-form-style-main-bg="1" data-form-style-main-border-color="1" data-form-style-main-font-color-hover="1">
			</div>
			<div class="g-bg-gray-light-v5 g-color-gray-dark-v1 g-brd-around g-brd-white rounded-0" data-form-style-input-bg="1" data-form-style-input-select-bg="1" data-form-style-input-border="1" data-form-style-input-border-radius="1" data-form-style-main-font-color="1">
			</div>
			<div class="g-brd-around g-brd-gray-light-v2 g-color-gray-dark-v5 g-bg-black-opacity-0_7" data-form-style-input-border-color="1" data-form-style-input-border-hover="1" data-form-style-icon-font-color="1">
			</div>


			<!--			for resource booking-->
			<div class="g-bg-gray-dark-v5" data-form-style-bg-as-text="1">
			</div>

			<div class="g-bg-gray-light-v5" data-form-style-input-bg-light="1">
			</div>

			<div class="g-bg-gray-light-v4" data-form-style-input-bg-light2="1">
			</div>

			<div class="g-bg-primary-opacity-0_4" data-form-style-main-bg-light="1">
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 order-2 order-md-1">
				<div class="bitrix24forms g-brd-white-opacity-0_6 u-form-alert-v4" data-b24form="39|pnrr4o" data-b24form-use-style="Y" data-b24form-show-header="N" data-b24form-original-domain="https://movens.bitrix24.ru"><iframe id="bx_form_iframe_39" name="bx_form_iframe_39" src="https://movens.bitrix24.ru/pub/form.php?view=frame&amp;form_id=39&amp;widget_user_lang=ru&amp;sec=pnrr4o&amp;r=1594290725218#%7B%22domain%22%3A%22https%3A%2F%2Fevent.movens.ru%22%2C%22from%22%3A%22https%3A%2F%2Fevent.movens.ru%2Fpreview%2F3bd0ccae227cd9dc80b53f2f313e11b5%2Ftickets%2Fbilety-na-poezd-002y-moskva-kazan%2F%22%2C%22options%22%3A%7B%7D%7D" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" style="width: 100%; height: 911px; border: 0px; overflow: hidden; padding: 0px; margin: 0px;"></iframe></div>
			</div>

			<div class="col-md-6 order-1 order-md-2">
				<div class="text-center g-overflow-hidden">
					<h3 class="landing-block-node-main-title h3 text-uppercase g-font-weight-700 g-color-black text-left g-mb-10 g-font-size-20">Заказать жд билеты на поезд №002Й</h3>

					<div class="landing-block-node-text g-line-height-1_5 text-left g-mb-40 g-color-gray-dark-v5" data-form-style-main-font-family="1" data-form-style-main-font-weight="1" data-form-style-header-text-font-size="1"><p>Заполните форму и мы свяжемся с вами, чтобы проконсультировать по всем вопросам групповой перевозке пассажиров на российских железных дорогах.</p><p>Немного полезной информации, перед тем как планировать групповую перевозку в поездах РЖД:</p><p></p><ul><li>Заявку лучше подавать более чем за 90 дней до времени планируемого отправления поезда;</li><li>Собрать данные пассажиров, руководителя группы и медработника для оформления групповых билетов в РЖД;</li><li>Вы существенно ускорите процесс оформления индивидуальных билетов для группы пассажиров, если внесете данные в бланк списка пассажиров.</li></ul><p>Чтобы получить оперативно все ответы на вопросы о групповых перевозках, вам достаточно просто позвонить нам.</p><p></p></div>
					<div class="g-mx-minus-2 g-my-minus-2">
						<div class="row mx-0"><div class="landing-block-card-contact js-animation fadeIn col-sm-6 g-brd-left g-brd-bottom g-brd-gray-light-v4 g-px-15 g-py-25 landing-card" data-card-preset="link" style="animation-duration: 1000ms; animation-play-state: running; animation-name: none;">
								<a href="tel:+74954142242" class="landing-block-card-linkcontact-link g-text-decoration-none--hover" target="_self">
									<span class="landing-block-card-contact-icon-container g-color-primary g-line-height-1 d-inline-block g-font-size-50 g-mb-30">
										<i class="landing-block-card-linkcontact-icon icon-call-in" data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;enabled&quot;:false}"></i>
									</span>
									<span class="landing-block-card-linkcontact-title h3 d-block text-uppercase g-font-size-11 g-color-gray-dark-v5 mb-0" data-form-style-label-font-weight="1" data-form-style-label-font-size="1" data-form-style-second-font-color="1">Телефон</span>
									<span class="landing-block-card-linkcontact-text g-text-decoration-none g-text-underline--hover g-font-weight-700 g-color-gray-dark-v1 g-font-size-15">+7 495 414 22 42 доб. 103</span>
								</a>
							</div><div class="landing-block-card-contact js-animation fadeIn col-sm-6 g-brd-left g-brd-bottom g-brd-gray-light-v4 g-px-15 g-py-25 landing-card" data-card-preset="link" style="animation-duration: 1000ms; animation-play-state: running; animation-name: none;">
								<a href="mailto:tickets@movens.ru" class="landing-block-card-linkcontact-link g-text-decoration-none--hover" target="_self">
									<span class="landing-block-card-contact-icon-container g-color-primary g-line-height-1 d-inline-block g-font-size-50 g-mb-30">
										<i class="landing-block-card-linkcontact-icon icon-line icon-envelope-letter" data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;enabled&quot;:false}"></i>
									</span>
									<span class="landing-block-card-linkcontact-title h3 d-block text-uppercase g-font-size-11 g-color-gray-dark-v5 mb-0" data-form-style-label-font-weight="1" data-form-style-label-font-size="1" data-form-style-second-font-color="1">Почта</span>
									<span class="landing-block-card-linkcontact-text g-text-decoration-none g-text-underline--hover g-font-weight-700 g-color-gray-dark-v1 g-font-size-15">tickets@movens.ru</span>
								</a>
							</div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
        ';
        
        
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
        

        // Создаем страницу с шапкой и подвалом
        $fields = array(
            'TITLE' => $title, 
            'CODE' => $code, 
            'SITE_ID' => $site_id, 
            'SITEMAP' => 'Y', 
            'FOLDER_ID' => $folder_id,            
        );
        
        $result = CRest::call(
            'landing.landing.add', 
            [
                'fields' => $fields
            ]
        );
        
        CRest::setLog(
			[
				'fields' => $fields,
				'result' => $result,
			],
			'landing.landing.add'
		);

        $lid = $result[result];


        // Создаем блоки на странице    
        $id_block = None;
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
                'landing.landing.add'
            );
            
            $id_block = $result[result];
        }


        echo "Сделано ".$lid;
*/



        #$result = CRest::call('landing.block.getlist', ['lid' => 899, ['params' => ['edit_mode' => 1]]]);
        #print_r($result);
        #echo $result[result];
        #foreach($result[result][0] as $key=>$val) echo $key." ".$val."<br>";  




		?>
	</div>
</body>
</html>