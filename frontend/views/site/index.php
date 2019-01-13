<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="banner banner--light">
    	<p class="banner__header">StockTrade</p>
		<p class="banner__info">News that make the <span class="bold">difference</span>!</p>
    </div>
	<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <div class="container spacing-vertical-outer-main">
    	<div class="row">
	    	<div class="col-xs-12 col-sm-5 col-md-6 hidden-xs">
	    		<?= Html::img('@commonImages/decorative/teamwork.jpg', ['alt' => 'Teamwork', 'class' => 'img-responsive center-block']); ?>
	    	</div>
	    	<div class="col-xs-12 col-sm-7 col-md-6">
	    		<h1 class="header-1">About the project</h1>
	    		<p>This project is for the course "Software Engineering of Web Applications" in MSc in Web Intelligence by the Department of Information Technology of Alexander TEI of Thessaloniki under the supervision of professors Michalis Salampasis, Antonis Sidiropoulos and Stefanos Ougiaroglou.</p>
	    		<p>It is developed by the team of the following students: <span class="bold">Konstantinos Mitsarakis (GR)</span>, <span class="bold">Charis Vairlis (GR)</span> and <span class="bold">Dan Šilhavý (CZ)</span>.</p>
	    		<p class="spacing-vertical-outer-main">The aim of this project is to build an API application and for that we have chosen the IEX (Investors Exchange) API solution.</p>
	    		<div class="buttons-row">
	    			<?= Html::a('GitHub', 'https://github.com/kostmits83/m102', ['class' => 'btn button--attention button buttons-row__button buttons-row__button--first js-external']); ?>
	    			<?= Html::a(Yii::t('app/buttons', 'contact'), ['site/contact'], ['class' => 'btn button--default button buttons-row__button buttons-row__button--last']); ?>
		    	</div>
	    	</div>
	    </div>
    </div>

	<div class="team-members">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-xs-12">
					<h2 class="team-members__header header-2">Team Members</h2>
					<p class="team-members__description">UX &amp; UI Design, Product &amp; Project Management, Backend &amp; Frontend Developing, Testing</p>
					<div class="team-members__all">
						<div class="team-member">
							<?= Html::img('@commonImages/team-members/mitsarakis-konstantinos.jpg', ['alt' => 'Konstantinos Mitsarakis', 'class' => 'img-responsive team-member__image']); ?>
							<p class="team-member__name header-3"><a class="js-external" href="https://www.linkedin.com/in/konstantinos-mitsarakis-a9768350/"><span class="team-member__link link link--state-1">Konstantinos Mitsarakis</span></a></p>
							<p class="team-member__info">A disciplined self-motivated web developer with strong team spirit and well-rounded experience in both backend and frontend development. Efficient in problem-solving and able to teach myself but also learn from the surrounding environment.</p>
						</div>
						<div class="team-member">
							<?= Html::img('@commonImages/team-members/vairlis-charalampos.jpg', ['alt' => 'Charalampos Vairlis', 'class' => 'img-responsive team-member__image']); ?>
							<p class="team-member__name header-3"><a class="js-external" href="https://www.linkedin.com/in/charalabos-vairlis/"><span class="team-member__link link link--state-1">Charalampos Vairlis</span></a></p>
							<p class="team-member__info">A junior level full-stack web developer, with exellent ability to learn and implement new concepts of programming. Passionate about teamwork and very confident in his ability to produce.</p>
						</div>
						<div class="team-member">
							<?= Html::img('@commonImages/team-members/silhavy-dan.jpg', ['alt' => 'Dan Šilhavý', 'class' => 'img-responsive team-member__image']); ?>
							<p class="team-member__name header-3"><a class="js-external" href="https://www.linkedin.com/"><span class="team-member__link link link--state-1">Dan Šilhavý</span></a></p>
							<p class="team-member__info">A less disciplined motivator who likes to energise people around, be it a vampire or an IT person, Dan doesn’t hold his spirit tight. He knows his JS and PHP and helped with some project management, documentation, texts and graphics.</p>
						</div>
					</div>
				</div>
	    	</div>
	    </div>
	</div>

    <div class="container skills">
    	<div class="row">
    		<h2 class="skills__header header-2">Skills</h2>
    		<div class="col-xs-12">
    			<div class="container">
	    			<div class="row">
	    				<div class="col-xs-12 col-md-6">
							<div class="skill">
				    			<p class="skill__name">Project Management <span class="skill__percent">100%</span></p>
				    		</div>
	    				</div>
	    				<div class="col-xs-12 col-md-6">
							<div class="skill">
				    			<p class="skill__name">UX UI Design <span class="skill__percent">100%</span></p>
				    		</div>
	    				</div>
	    			</div>
		    	</div>
		    </div>
			<div class="col-xs-12">
				<div class="container">
	    			<div class="row">
	    				<div class="col-xs-12 col-md-6">
							<div class="skill">
				    			<p class="skill__name">Web Development <span class="skill__percent">100%</span></p>
				    		</div>
	    				</div>
	    				<div class="col-xs-12 col-md-6">
							<div class="skill">
				    			<p class="skill__name">API Integration <span class="skill__percent">100%</span></p>
				    		</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
    	</div>
    </div>

	<div class="technologies">
		<h2 class="technologies__header header-1">Technologies Used</h2>
	    <div class="container">
	    	<div class="row">
				<div class="technologies__all">
					<div>
			    		<div class="col-xs-12 col-sm-6 technologies__group">
							<h3 class="technologies__subheader header-2">Backend</h3>
							<div class="technology">
								<h3 class="technology__header header-3">Yii 2 Framework</h3>
								<p class="technology__description">Yii is an open source, object-oriented, component-based MVC web application framework. Yii is originally Chinese framework and the names is pronounced as "Yee" or [ji:], which means "simple and evolutionary".</p>
								<a class="technology__link js-external" href="https://www.yiiframework.com/"><span class="link link--state-1">www.yiiframework.com</span></a>
							</div>
							<div class="technology">
								<h3 class="technology__header header-3">MySQL</h3>
								<p class="technology__description">MySQL is an Oracle-backed open source relational database management system (RDBMS) based on Structured Query Language (SQL). MySQL runs on virtually all platforms, including Linux, UNIX and Windows.</p>
								<a class="technology__link js-external" href="https://www.mysql.com/"><span class="link link--state-1">www.mysql.com</span></a>
							</div>
			    		</div>

			    		<div class="col-xs-12 col-sm-6 technologies__group">
							<h3 class="technologies__subheader header-2">Frontend</h3>
							<div class="technology">
								<h3 class="technology__header header-3">Bootstrap</h3>
								<p class="technology__description">Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.</p>
								<a class="technology__link js-external" href="https://getbootstrap.com/"><span class="link link--state-1">getbootstrap.com</span></a>
							</div>
							<div class="technology">
								<h3 class="technology__header header-3">jQuery</h3>
								<p class="technology__description">jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.</p>
								<a class="technology__link js-external" href="https://jquery.com/"><span class="link link--state-1">jquery.com</span></a>
							</div>
			    		</div>

			    		<div class="col-xs-12 col-sm-6 technologies__group">
							<h3 class="technologies__subheader header-2">Infrastructure</h3>
							<div class="technology">
								<h3 class="technology__header header-3">WAMP</h3>
								<p class="technology__description">WampServer is a Windows web development environment. It allows you to create web applications with Apache2, PHP and a MySQL database. Alongside, PhpMyAdmin allows you to manage easily your databases.</p>
								<a class="technology__link js-external" href="http://www.wampserver.com/en/"><span class="link link--state-1">www.wampserver.com</span></a>
							</div>
							<div class="technology">
								<h3 class="technology__header header-3">HashiCorp Vagrant</h3>
								<p class="technology__description">Vagrant provides the same, easy workflow regardless of your role as a developer, operator, or designer. It leverages a declarative configuration file which describes all your software requirements, packages, operating system configuration, users, and more.</p>
								<a class="technology__link js-external" href="https://www.vagrantup.com/"><span class="link link--state-1">www.vagrantup.com</span></a>
							</div>
			    		</div>

			    		<div class="col-xs-12 col-sm-6 technologies__group">
							<h3 class="technologies__subheader header-2">Collaboration Tools</h3>
							<div class="technology">
								<h3 class="technology__header header-3">Asana</h3>
								<p class="technology__description">Asana is the work management platform teams use to stay focused on the goals, projects, and daily tasks that grow your business. Plan and structure work in a way that’s best for you. Set priorities and deadlines. Share details and assign tasks. All in one place.</p>
								<a class="technology__link js-external" href="https://asana.com/"><span class="link link--state-1">asana.com</span></a>
							</div>
							<div class="technology">
								<h3 class="technology__header header-3">Slack</h3>
								<p class="technology__description">When your team needs to kick off a project, hire a new employee, deploy some code, review a sales contract, finalize next year's budget, measure an A/B test, plan your next office opening, and more, Slack has you covered.</p>
								<a class="technology__link js-external" href="https://slack.com/"><span class="link link--state-1">slack.com</span></a>
							</div>
			    		</div>

			    	</div>
			    </div>
	    	</div>
	    </div>
	</div>

	<div class="project-metrics">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 project-metric">
					<span class="project-metric__icon"><i class="fas fa-code-branch"></i></span>
					<p class="project-metric__header">Branches:</p>
					<p class="project-metric__number">94</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 project-metric">
					<span class="project-metric__icon"><i class="fas fa-code"></i></span>
					<p class="project-metric__header">Commits:</p>
					<p class="project-metric__number">185</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 project-metric">
					<span class="project-metric__icon"><i class="fas fa-user"></i></span>
					<p class="project-metric__header">Contributors:</p>
					<p class="project-metric__number">3</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 project-metric">
					<span class="project-metric__icon"><i class="fas fa-coffee"></i></span>
					<p class="project-metric__header">Cups of Coffee:</p>
					<p class="project-metric__number">250</p>
				</div>
			</div>
		</div>
	</div>
</div>
