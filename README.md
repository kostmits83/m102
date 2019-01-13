<h1 id="stockexchangewebapi">Stock Exchange Web API</h1>

<h3 id="iextradingapiintegrationforsoftwareengineeringofwebapplicationshttpswwwteithegr">IEXtrading API Integration for Software Engineering of Web Applications project | <a href="https://www.teithe.gr">Α.Τ.Ε.Ι. Θεσσαλονίκης</a></h3>

<p><img src="https://img.shields.io/scrutinizer/build/g/filp/whoops.svg" alt="Build" />
<img src="https://poser.pugx.org/pugx/badge-poser/license?format=flat" alt="License" /></p>

<p><em>This project is for the graduate course in MSc. under the supervision of Dr. Michaelis Salampasis. It is developed by a team of 3: <strong>Konstantinos Mitsarakis</strong> (GR), <strong>Charis Vairlis</strong> (GR) and <strong>Dan Šilhavý</strong> (CZ).</em> </p>

<p>The aim of this project is to build an API application and for that we have chosen the IEX (<a href="https://iextrading.com/developer/">Investors Exchange</a>) API solution.</p>

<hr />

<h2 id="projecturl">Project URL</h2>

<p>You can find the <a href="http://www.382235420.linuxzone118.grserver.gr/m102/">project online here</a>.</p>

<hr />

<h2 id="projectdocumentation">Project Documentation</h2>

<p>You can find <a href="https://docs.google.com/document/d/1zoHeVy3oKuG-4UezR6bOgWElgrPEIpvrsMJgqf8iXM0/edit">project Final ducumentation online here</a>.</p>

<p>Also, you can find the documentation file at the root of this project as documentation.pdf</p>

<hr />

<h3 id="tableofcontents">Table of Contents</h3>

<h4 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="https://github.com/kostmits83/m102/wiki/1.-IEX-API">1) IEX API</a></h4>

<ul>
<li> <a href="https://github.com/kostmits83/m102/wiki/1.-IEX-API#11-getting-started">1.1) Getting started </a></li>

<li> <a href="https://github.com/kostmits83/m102/wiki/1.-IEX-API#usages">1.2) API UseCases </a></li>
</ul>

<h4 id="2technologieshttpsgithubcomkostmits83m102wiki2buildwith"><a href="https://github.com/kostmits83/m102/wiki/2.-Build-WIth">2) Technologies</a></h4>

<ul>
<li> <a href="https://github.com/kostmits83/m102/wiki/2.-Build-With#21-yii">2.1) Yii, PHP framework</a></li>

<li> <a href="https://github.com/kostmits83/m102/wiki/2.-Build-With#22-bootstrap">2.2) Bootstrap, FrontEnd framework</a></li>

<li> <a href="https://github.com/kostmits83/m102/wiki/2.-Build-With#3-sass-css-preprocessor">2.3) SASS, CSS preprocessor</a></li>
</ul>

<h4 id="3interactionsbetweenfrontendbackendandtheapihttpsgithubcomkostmits83m102wiki3interactions"><a href="https://github.com/kostmits83/m102/wiki/3.-Interactions">3) Interactions between front-end, back-end and the API</a></h4>

<ul>
<li> <a href="https://github.com/kostmits83/m102/wiki/3.-Interactions#31-components-of-the-application">3.1) Components</a></li>

<li> <a href="https://github.com/kostmits83/m102/wiki/3.-Interactions#32-interaction-between-the-components">3.2) Interactions</a></li>
</ul>

<h4 id="4teammanagementcollaborationtoolshttpsgithubcomkostmits83m102wiki4teammanagementcollaboration"><a href="https://github.com/kostmits83/m102/wiki/4.-Team-management-&amp;-collaboration">4) Team management &amp; collaboration tools</a></h4>

<h4 id="5systemrequirementshttpsgithubcomkostmits83m102wiki5systemrequirements"><a href="https://github.com/kostmits83/m102/wiki/5.-System-requirements">5) System requirements</a></h4>

<h4 id="6versioninghttpsgithubcomkostmits83m102wiki6versioning"><a href="https://github.com/kostmits83/m102/wiki/6.-Versioning">6) Versioning</a></h4>

<h4 id="7authorshttpsgithubcomkostmits83m102wiki7authors"><a href="https://github.com/kostmits83/m102/wiki/7.-Authors">7) Authors</a></h4>

<h4 id="8licensehttpsgithubcomkostmits83m102wiki8license"><a href="https://github.com/kostmits83/m102/wiki/8.-License">8) License</a></h4>

<h4 id="9securityhttpsgithubcomkostmits83m102wiki9security"><a href="https://github.com/kostmits83/m102/wiki/9.-Security">9) Security</a></h4>

<h4 id="10acknowledgmentshttpsgithubcomkostmits83m102wikiacknowledgements"><a href="https://github.com/kostmits83/m102/wiki/Acknowledgements">10) Acknowledgments</a></h4>

<p align="center">
    <h1 align="center">Software Engineering for Web Applications - M102</h1>
    <br>
</p>


<h3 id="applicationprogramminginterfaceapi">Application programming interface (API)</h3>

<p>is a set communication protocols and tools for building software. In general terms, it is a set of clearly defined methods of communication among various components. A good API makes it easier to develop a computer program by providing all the building blocks, which are then put together by the programmer.</p>

<p>An API may be for a web-based system or operating system, database system, computer hardware or software library.</p>

<p>APIs as a way to serve your customers
You’ve probably heard of companies packaging APIs as products. For example, Weather Underground sells access to its weather data API.</p>

<p>Example scenario: Your small business’s website has a form used to sign clients up for appointments. You want to give your clients the ability to automatically create a Google calendar event with the details for that appointment.</p>

<p>API use: The idea is to have your website’s server talk directly to Google’s server with a request to create an event with the given details. Your server would then receive Google’s response, process it, and send back relevant information to the browser, such as a confirmation message to the user.</p>

<p>Alternatively, your browser can often send an API request directly to Google’s server bypassing your server.</p>

<p><strong><em>We chose a web API for stock markets and exchange.</em> - IEX API</strong></p>

<hr />

<h3 id="1iexapi">1) IEX API</h3>

<p>is a free and reliable set of services designed for developers and engineers that are functioning and surrounding the <strong>IEX stock exchange</strong> (For further explanation how the stock market works see <a href="http://www.iextrading.com">www.iextrading.com</a>). The API can be used to build both high-quality or prototype application and services.</p>

<p><strong>Features of IEX API</strong></p>

<ol>
<li><p><strong>Active-Active</strong>
Multiple copies of every IEX server to ensure high availability and to protect against regional failures.</p></li>

<li><p><strong>Redundant</strong>
5 datacenters with multiple DNS providers.</p></li>

<li><p><strong>Auto-Scaling</strong>
Scaling of servers on-demand based on custom metrics.</p></li>
</ol>

<p><strong>Performance measures</strong></p>

<ul>
<li><p>99.981% web uptime.</p></li>

<li><p>100% database uptime.</p></li>

<li><p>3.5 million messages per second peak &amp; Data loss protection</p></li>

<li><p>262 TB data transfered per month</p></li>

<li><p>RegSCI System that regulates the API for the highest level of integrity, resiliancy, and security.</p></li>

<li><p>Google Cloud. High performance, scale, and reliability ensured by Google, LLC.</p></li>

<li><p>We developed and patented multiple ways to ensure data integrity.</p></li>

<li><p>1.1 trillion database records with 72 TB database size</p></li>

<li><p>600,000 queries per second peak</p></li>

<li><p>Redis caching: 180 K average operations per second</p></li>

<li><p>10.51 B operations per day</p></li>
</ul>

<p>More about IEX API at <strong><a href="https://iextrading.com/developer/">www.IEXtrading.com/Developer/</a>.</strong></p>

<hr />

<h3 id="11gettingstarted">1.1) Getting started</h3>

<h5 id="authentication">Authentication</h5>

<p>The IEX API is currently open and does not require authentication to access its data.</p>

<h5 id="endpoints">Endpoints</h5>

<p>All endpoints are prefixed with: https://api.iextrading.com/1.0
We support JSONP for all endpoints.</p>

<h5 id="ssl">SSL</h5>

<p>We provide a valid, signed certificate for our API methods. Be sure your connection library supports HTTPS with the SNI extension.</p>

<h5 id="httpmethods">HTTP methods</h5>

<p>The IEX API only supports GET requests at this time.</p>

<h5 id="parameters">Parameters</h5>

<p>Parameter values must be comma-delimited when requesting multiple.
(i.e. ?symbols=SNAP,fb is correct.)
Casing does not matter when passing values to a parameter.
(i.e. Both ?symbols=fb and ?symbols=FB will work.)
Be sure to url-encode the values you pass to your parameter.
(i.e. ?symbols=AIG+ encoded is ?symbols=AIG%2b.)
Filter results
All HTTP request endpoints support a filter parameter to return a subset of data. Pass a comma-delimited list of field names to filter. Field names are case-sensitive and are found in the Reference section of each endpoint.</p>

<p>Example: <code>?filter=symbol,volume,lastSalePrice will return only the three fields specified.</code></p>

<h5 id="websockets">WebSockets</h5>

<p>WebSocket support is limited at this time to Node.js server clients and socket.io browser clients. We use socket.io for our WebSocket server. The WebSocket examples in our documentation assume a socket.io browser client is being used. We’re planning to rewrite our WebSocket server for broader support.</p>

<p>For socket.io clients, use: https://ws-api.iextrading.com/1.0
Examples that shows a connection to the tops channel and a subscribtion to snap,fb,aig+ topics</p>

<p><code>// Import socket.io with a connection to a channel (i.e. tops)</code>
<code>const socket = require('socket.io-client')('https://ws-api.iextrading.com/1.0/tops')</code></p>

<p><code>// Listen to the channel's messages</code>
<code>socket.on('message', message =&gt; console.log(message))</code></p>

<p><code>// Connect to the channel</code>
<code>socket.on('connect', () =&gt; {</code></p>

<p><code>// Subscribe to topics (i.e. appl,fb,aig+)</code>
  <code>socket.emit('subscribe', 'snap,fb,aig+')</code></p>

<p><code>// Unsubscribe from topics (i.e. aig+)</code>
  <code>socket.emit('unsubscribe', 'aig+')</code>
<code>})</code></p>

<p><code>// Disconnect from the channel</code>
<code>socket.on('disconnect', () =&gt; console.log('Disconnected.'))</code></p>

<h5 id="usages">Usages</h5>

<p>To provide the best experience for all our users, we monitor for suspicious activity and overload. We reserve the right to revoke access to anyone who abuses the IEX API. We throttle endpoints by IP, but you should be able to achieve over 100 requests per second.</p>

<hr />

<p>Changelog and other relevant information can be found at <a href="https://iextrading.com/developer/docs/#changelog">www.iextrading.com/developer/docs/#changelog</a></p>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="https://github.com/kostmits83/m102/wiki/2.-Build-With">2. Technologies</a></h3>

<ol>
<li><p><strong>Yii</strong> / PHP framework</p></li>

<li><p><strong>Bootstrap</strong> / Front-end framework</p></li>

<li><p><strong>SASS</strong> / CSS preprocessor</p></li>
</ol>

<hr />

<h4 id="21yii">2.1) Yii</h4>

<p>is an open source, object-oriented, component-based MVC web application framework. Yii is originally Chinese framework and  the names is pronounced as "Yee" or [ji:], which means "simple and evolutionary".</p>

<p>Yii 1.1 was released in January 2010 adding a form builder, relational Active record queries, a unit testing framework and more. The Yii community continues to follow the 1.1 branch with<em>* PHP7 support *</em>and security fixes. The last release was version 1.1.20 in July 2018. Stable version.</p>

<p>In May 2011 the developers decided to use new PHP versions and fix architectural shortcomings, resulting in version 2.0. In May 2013 the Yii 2.0 code went public, followed by the first stable release in October 2014. PHP7 is supported since version 2.0.9.</p>

<p><strong>Features</strong></p>

<ul>
<li>Model-View-Controller (MVC) design pattern.</li>

<li>Generation of complex WSDL service specifications and management of Web service request handling.</li>

<li>Internationalization and localization (I18N and L10N), comprising message translation, date and time formatting, number formatting, and interface localization.</li>

<li>Layered caching scheme, which supports data caching, page caching, fragment caching and dynamic content. The storage medium of caching can be changed.</li>

<li>Error handling and logging. Log messages can be categorized, filtered and routed to different destinations.</li>

<li>Security measures include prevention of cross-site scripting (XSS), cross-site request forgery (CSRF) and cookie tampering.</li>

<li>Unit and functionality testing based on PHPUnit and Selenium.</li>

<li>Automatic code generation for the skeleton application, CRUD applications, through the Gii tool.</li>

<li>Code generated by Yii components and command line tools complies to the XHTML standard.</li>

<li>Designed to work well with third-party code. For example, it's possible to include code from PEAR or the Zend Framework.</li>
</ul>

<p><em>More information at <a href="https://www.yiiframework.com/">www.yiiframework.com</a>.</em></p>

<hr />

<h4 id="22bootstrap">2.2) <strong>Bootstrap</strong></h4>

<p>is a free and open-source front-end framework for designing websites and web applications. It contains HTML and CSS-based design templates for typography, forms, buttons, navigation and other interface components, as well as optional JavaScript extensions. Unlike many earlier web frameworks, it concerns itself with front-end development only.</p>

<p><strong>Features</strong></p>

<ul>
<li><p>Support for the latest versions of the Google Chrome, Firefox, Internet Explorer, Opera, and Safari (except on Windows). </p></li>

<li><p>Support for responsive web design (mobile-first design attitude)</p></li>

<li><p>Layout of web pages adjusts dynamically taking into account the characteristics of the device used (desktop, tablet, mobile phone).</p></li>

<li><p>Sass and flexbox support.</p></li>
</ul>

<p><em>More information at <a href="https://getbootstrap.com">www.getbootstrap.com</a>.</em></p>

<hr />

<h4 id="3sasscsspreprocessor">2.3) <strong>SASS, CSS preprocessor</strong></h4>

<p>stands for <em>Syntactically awesome style sheets</em> and it is a style sheet language initially designed by Hampton Catlin and developed by Natalie Weizenbaum. </p>

<p>SASS is interpreted or compiled into Cascading Style Sheets (CSS). SassScript is the scripting language itself. Sass consists of two syntaxes. The original syntax, called "the indented syntax", uses a syntax similar to Haml.[4] It uses indentation to separate code blocks and newline characters to separate rules. The newer syntax, "SCSS" (Sassy CSS), uses block formatting like that of CSS. It uses braces to denote code blocks and semicolons to separate lines within a block. The indented syntax and SCSS files are traditionally given the extensions .sass and .scss, respectively.</p>

<p><strong>Features</strong></p>

<ul>
<li>Logical Nesting of styles </li>

<li>Variables with these data types: Numbers, Strings, Colors &amp; Booleans</li>

<li>Functions (Mixins), </li>

<li>Math</li>
</ul>

<p><em>More information at <a href="https://sass-lang.com">www.sass-lang.com</a>.</em></p>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="https://github.com/kostmits83/m102/wiki/3.-Interactions">3. Interactions</a></h3>

<h3 id="31componentsoftheapplication">3.1) Components of the application</h3>

<h3 id="frontend">Frontend</h3>

<p>All things the browser can read, display and/or run. This means HTML, CSS and JavaScript.</p>

<p>HTML (Hypertext Markup Language) tells the browser “what” content is, eg. “heading”, “paragraph”, “list”, “list item”.</p>

<p>CSS (Cascading Style Sheets) tells the browser how to display elements eg. “the first paragraph has a 20px margin after it”, “all text in the ‘body’ element should be dark grey in colour and use Verdana as its font”.</p>

<p>JavaScript tells the browser how to react to some interactions using a lightweight programming language. A lot of websites don’t actually use much JavaScript but if you click on something and content changes without the page flickering to white before showing the new content, that means JavaScript is used somewhere.</p>

<h3 id="backend">Backend</h3>

<p>All things that run on a server ie. “not in the browser” or “on a computer connected to a network (usually the internet) that replies to other computers’ messages” are backend.</p>

<p>For your backend you can use any tool available on your server (which is just a computer that is set up to reply to messages). This means you can use any general purpose programming language, eg. Ruby, PHP, Python, Java, JavaScript/Node, bash. It also means you can use a host of Database Management Systems eg. MySQL, PostgreSQL, MongoDB, Cassandra, Redis, Memcached.</p>

<h3 id="32interactionbetweenthecomponents">3.2) Interaction between the components</h3>

<p>There are two main architectures today that define how your backend and frontend interact:</p>

<p><strong>Server-rendered apps</strong>
The first is straight up HTTP requests to a server-rendered app. This is a system whereby the browser sends a HTTP request and the server replies with a HTML page.</p>

<p>Between receiving the request and responding, the server usually queries the database and feeds it into a template (ERB, Blade, EJS, Handlebars).</p>

<p>Once the page is loaded in the browser, HTML defines what things are, CSS how they look and JS any special interactions.</p>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="https://github.com/kostmits83/m102/wiki/4.-Team-management-&-collaborationcollaboration">4. Team management & collaboration</a></h3>

<ul>
<li><strong>Asana</strong> / Project management system</li>

<li><strong>Slack</strong> / Communication tool</li>

<li><strong>GitHub</strong> / Versioning and hosting</li>

<li><strong>Goole Drive</strong> / Goole presentation</li>
</ul>

<p>Project management is available here: <a href="https://app.asana.com/0/885036296387213/885036296387213">https://app.asana.com/0/885036296387213/885036296387213</a>.</p>

<p>GitHub repository is public too.</p>

<hr />

<p><strong>Asana</strong> is a free web and mobile application designed to help teams organise, track, and manage work.
<a href="www.Asana.com">www.Asana.com</a></p>

<p><strong>Slack</strong> is a cloud-based set of proprietary team collaboration tools and services which succeeded in August 2018, Atlassian's two enterprise communications tools, HipChat and Stride.</p>

<p><strong>GitHub</strong> is web-based hosting service for version control using Git. It is mostly used for computer code. It offers all of the distributed version control and source code management (SCM) functionality of Git as well as adding its own features. It provides access control and several collaboration features such as bug tracking, feature requests, task management, and wikis for every project.</p>

<p>GitHub offers plans for both private repositories and free accounts which are commonly used to host open-source software projects.</p>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="github.com/kostmits83/m102/wiki/6.-System-requirements">5. System requirements & installation guide</a></h3>

<p>The application runs on Apache, PHP, mySQL and is used by mentioned frameworks and technologies, see <a href="#heading">2) Technologies</a>.</p>

<h4 id="minimumrequirementsbyyii">Minimum Requirements by Yii:</h4>

<ul>
<li>Web server supports PHP 5.1.0 or above. </li>

<li>Apache HTTP server, version 1.1.0c and above (It may also run on other Web servers and platforms provided PHP 5 is supported)</li>
</ul>

<h1><span style="font-weight: 400;">Installation guide</span></h1>
<h2><span style="font-weight: 400;">Server</span></h2>
<p><span style="font-weight: 400;">You can install WAMP (</span><a href="http://www.wampserver.com/en/"><span style="font-weight: 400;">http://www.wampserver.com/en/</span></a><span style="font-weight: 400;">) or XAMPP (</span><a href="https://www.apachefriends.org/index.html"><span style="font-weight: 400;">https://www.apachefriends.org/index.html</span></a><span style="font-weight: 400;">) or you can use Vagrant.</span></p>
<h2><span style="font-weight: 400;">Yii</span></h2>
<p><span style="font-weight: 400;">The proposed way is using Vagrant. Vagrant will isolate dependencies and their configuration within a single disposable, consistent environment, without sacrificing any of the tools you are used to working with (editors, browsers, debuggers, etc.). </span></p>
<p><span style="font-weight: 400;">Once you or someone else creates a single Vagrantfile, you just need to vagrant up and everything is installed and configured for you to work. Other members of your team create their development environments from the same configuration, </span></p>
<p><span style="font-weight: 400;">so whether you are working on Linux, Mac OS X, or Windows, all your team members are running code in the same environment, against the same dependencies, all configured the same way.</span></p>
<p><span style="font-weight: 400;">So, having set up a web server e.g. WAMP you have to follow the steps below:</span></p>
<ol>
<li style="font-weight: 400;"><span style="font-weight: 400;">Open a console terminal.</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Go to your www folder.</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Run the following command composer create-project --prefer-dist yiisoft/yii2-app-advanced your-project-name</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Execute the init command and select dev as environment.</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Create a new database and adjust the components['db'] configuration in /path/to/your-project-name/common/config/main-local.php accordingly.</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Apply migrations using terminal command /path/to/php-bin/php /path/to/your-project-name/yii migrate.</span></li>
</ol>
<p><span style="font-weight: 400;">All database changes and modifications will be handled using migrations. Because a database structure change often requires some source code changes, migration feature allows you to keep track of database changes in terms of database migrations which are version-controlled together with the source code.</span></p>
<h2><span style="font-weight: 400;">SCSS</span></h2>
<p><span style="font-weight: 400;">To install SCSS you can simply pick the way you like best from </span><a href="https://sass-lang.com/install"><span style="font-weight: 400;">https://sass-lang.com/install</span></a></p>
<h2><span style="font-weight: 400;">Compass</span></h2>
<p><span style="font-weight: 400;">We use a useful CSS Authoring Framework called Compass which requires Ruby ( </span><a href="https://rubyinstaller.org/downloads/"><span style="font-weight: 400;">https://rubyinstaller.org/downloads/).</span></a></p>
<p><span style="font-weight: 400;">Then install Compass from </span><span style="font-weight: 400;"><a href="http://compass-style.org/install/">http://compass-style.org/install/</a>.</span></p>
<p><span style="font-weight: 400;">When doing development on your project, you can run the compass watcher to keep your CSS files up to date as changes are made. Open terminal console, go to your CSS folder and execute the following:</span></p>
<p><em><span style="font-weight: 400;">run watch /path/to/your-project-name/common/common/web/css/sass</span></em></p>
<h1><span style="font-weight: 400;">Requirements</span></h1>
<ul>
<li style="font-weight: 400;"><span style="font-weight: 400;">Login/Logout</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Register</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Account activation</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Password restore</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Contact form</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">API Integration</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Query single stock</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Show logos</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Query Top 10 (gainers, losers)</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Show various charts</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Show lists</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Get market news</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Add to favorites</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Add for comparison</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Add user portfolio history</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Admin panel for user administration</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Add IP block functionality for admin panel</span></li>
</ul>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="github.com/kostmits83/m102/wiki/6.-Versioning">6. Versioning</a></h3>

<p>We use <strong>GIT</strong> as our version-control system.
It enables us tracking of changes in computer files and coordinating work on those files among multiple people. It is primarily used for source-code management in software development, but it can be used to keep track of changes in any set of files. As a distributed revision-control system, it is aimed at speed,[9] data integrity,[10] and support for distributed, non-linear workflows.</p>

<p>Git was created by Linus Torvalds in 2005 for development of the Linux kernel, with other kernel developers contributing to its initial development. Its current maintainer since 2005 is Junio Hamano.</p>

<p>For better control over the team collaboration and state of the code we use a lot of <strong>branches</strong>, see <strong>GitHub repository <a href="https://github.com/kostmits83/m102/branches">here</a></strong>.</p>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="github.com/kostmits83/m102/wiki/7.-Authors">7. Authors</a></h3>

<ul>
<li><strong>Konstantinos Mitsarakis</strong> (GR, Alexander Technological Educational Institute of Thessaloniki), 
<a href="https://github.com/kostmits83">www.github.com/kostmits83</a> </li>

<li><strong>Dan Šilhavý</strong> (Czech Republic, Prague, University of Economics), 
<a href="https://github.com/Mr-Socrates">www.github.com/Mr-Socrates</a></li>

<li><strong>Charis Vairlis</strong> (GR, Alexander Technological Educational Institute of Thessaloniki), 
<a href="https://github.com/greekit">www.github.com/greekit</a></li>
</ul>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="github.com/kostmits83/m102/wiki/8.-Licence">8. Licence</a></h3>

<p>This project is under the MIT open software license.</p>

<blockquote>
  <p>MIT License</p>
  
  <p>Copyright (c) [2018]</p>
  
  <p>Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files (the "Software"), to deal
  in the Software without restriction, including without limitation the rights
  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
  copies of the Software, and to permit persons to whom the Software is
  furnished to do so, subject to the following conditions:</p>
  
  <p>The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.</p>
  
  <p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
  SOFTWARE.</p>
</blockquote>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="github.com/kostmits83/m102/wiki/9.-Security">9. Security</a></h3>

<blockquote>
  <p>This software was build to prevent or anticipate cross-fires attacks, sql injections, spam-bots and other relevant threats.</p>
</blockquote>

<h3 id="1iexapihttpsgithubcomkostmits83m102wiki1iexapi"><a href="https://github.com/kostmits83/m102/wiki/Acknowledgements">Acknowledgements</a></h3>

<blockquote>
  <p>The team thanks to the supervisors at the <a href="www.teithe.gr">Alexander Technological Educational Institute of Thessaloniki</a> and specifically Dan Šilhavý acknowledges the opportunity of studying abroad due to Erasmus+ programme.</p>
</blockquote>
