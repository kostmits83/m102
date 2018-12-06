<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div>
    	<p>This is just an image placeholder for aesthetically reasons.</p>
    </div>
	
	<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <div class="container-fluid">
    	<div class="row">
	    	<div class="col-xs-12 col-md-6">
	    		<img src="" alt="This is the about image project. It could be just the logo of the ATEITH or the MSc logo">
	    	</div>
	    	<div class="col-xs-12 col-md-6">
	    		<h1>Project header</h1>
	    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, assumenda.</p>
	    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo non itaque impedit vel, fugiat necessitatibus corporis quasi esse consequatur fuga!</p>
	    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta ipsum perferendis aut perspiciatis, dolore itaque aliquam obcaecati quisquam ratione beatae ullam officiis, earum! Dicta, pariatur, quas molestias excepturi architecto tenetur necessitatibus ullam assumenda inventore nisi vel totam? Labore, maiores, eum!</p>
	    		<a class="btn btn-default" href="https://github.com/kostmits83/m102">GitHub</a>
	    		<a class="btn btn-primary" href="/contact">Contact</a>
	    	</div>
	    </div>
    </div>

    <div class="container-fluid">
    	<div class="row">
			<h2>Team Members</h2>
			<div class="col-xs-12 col-md-4">
				<p>Dan Šilhavý</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab hic harum quae officia in dolorum repudiandae assumenda eius. Quae aut nemo earum, eaque ut est?</p>
			</div>
			<div class="col-xs-12 col-md-4">
				<p>Mitsarakis Konstantinos</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit consequuntur, voluptas assumenda porro, debitis eos impedit, dolorem, ipsum unde velit magni natus enim ex animi!</p>
			</div>
			<div class="col-xs-12 col-md-4">
				<p>Vairlis Charalampos</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, assumenda, dolorem. Corrupti perspiciatis eligendi nobis repellendus et neque, velit ea magni, voluptates, temporibus beatae sint.</p>
			</div>
    	</div>
    </div>

    <div class="container-fluid">
    	<div class="row">
    		<h2>Skills Developed</h2>
    		<div class="skillbar-title">
    			<p>Project Management</p>
    		</div>
    		<div class="skillbar-bar">
    			<p>A bar showing the skillbar.</p>
    		</div>

    		<div class="skillbar-title">
    			<p>UX UI Design</p>
    		</div>
    		<div class="skillbar-bar">
    			<p>A bar showing the skillbar.</p>
    		</div>

    		<div class="skillbar-title">
    			<p>Web Development</p>
    		</div>
    		<div class="skillbar-bar">
    			<p>A bar showing the skillbar.</p>
    		</div>

    		<div class="skillbar-title">
    			<p>API Integration</p>
    		</div>
    		<div class="skillbar-bar">
    			<p>A bar showing the skillbar.</p>
    		</div>
    	</div>
    </div>

    <div class="container-fluid">
    	<div class="row">
    		<h2>Technologies Used</h2>
    		<div class="col-xs-12 col-md-6">
				<h3>Backend</h3>
				<div>
					<h3>Yii 2 Framework</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos optio nobis rem? Adipisci assumenda laudantium aspernatur hic, optio dolores.</p>
				</div>
				<div>
					<h3>MySQL</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos optio nobis rem? Adipisci assumenda laudantium aspernatur hic, optio dolores.</p>
				</div>
    		</div>

    		<div class="col-xs-12 col-md-6">
				<h3>Frontend</h3>
				<div>
					<h3>SCSS</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos optio nobis rem? Adipisci assumenda laudantium aspernatur hic, optio dolores.</p>
				</div>
				<div>
					<h3>Bootstrap</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos optio nobis rem? Adipisci assumenda laudantium aspernatur hic, optio dolores.</p>
				</div>
    		</div>

    		<div class="col-xs-12 col-md-6">
				<h3>Infrastructure</h3>
				<div>
					<h3>WAMP/XAMPP</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos optio nobis rem? Adipisci assumenda laudantium aspernatur hic, optio dolores.</p>
				</div>
				<div>
					<h3>Vagrant</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos optio nobis rem? Adipisci assumenda laudantium aspernatur hic, optio dolores.</p>
				</div>
    		</div>

    		<div class="col-xs-12 col-md-6">
				<h3>Collaboration Tools</h3>
				<div>
					<h3>Asana</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos optio nobis rem? Adipisci assumenda laudantium aspernatur hic, optio dolores.</p>
				</div>
				<div>
					<h3>Slack</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos optio nobis rem? Adipisci assumenda laudantium aspernatur hic, optio dolores.</p>
				</div>
    		</div>
    	</div>
    </div>
</div>
