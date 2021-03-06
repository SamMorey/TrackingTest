<html>
	<head>
		<script type="text/javascript" src="vendor/jquery-1.11.1.js"></script>
	        <script type="text/javascript" src="vendor/keen.js"></script>
	        <script type="text/javascript" src="vendor/common-web.js"></script>
	        <script type="text/javascript" src="vendor/keen-local-storage.js"></script>
	</head> 
	<body> 	
	    <p>
		<a id="link-0" style="color: blue" class="classy classy2 classy3" href="./test.php">Hello world!</a>
	    </p>

	    <p>
		<a id="link-1" style="color: orange" href="./test.php">Hello no class world!</a>
	    </p>

	    <p>
		<a id="link-2" data-one="1" data-two="2" href="./test.php">Hello no class world!</a>
	    </p>

	    <p>
		<span id="span-0" class="less" data-three="three">Hello span!</span>
	    </p>

	    <p>
		<span id="span-1" class="more-stuff" data-four="four">More Stuff!</span>
	    </p>

	    <p>
		<span id="span-2" class="even-more-stuff" data-five="five">Even More Stuff!</span>
	    </p>

	    <form method="GET" action="./test.php" data-six="six">
		<input type="text" name="text field" id="text_field" placeholder="Type something" />
		<br>
		<select name="select field" id="select field">
		  <option value="1">Option One</option>
		  <option value="2">Option Two</option>
		  <option value="3">Option Three</option>
		<br>
		<textarea name="textarea field" id="textarea_field" placeholder="Type longer things"></textarea>
		<br>
		<input type="hidden" name="hidden field" id="hidden_field" value="this is hidden" />
		<input type="Submit" value="Submit">
	    </form>
	    <script type="text/javascript">

		// Common Web and Keen Setup

		// set a place in local storage so it doesn't conflict with other projects
		KeenLocalStorage.root = "/common-web-keen/";

		// capture project id and write key for the project you want to test out
		// not necessary where project info is configured in another way
		// if you want to change projects just call KeenLocalStorage.clear()
		KeenLocalStorage.prompt();

		// set up a keen client using the prompted local storage info
		CommonWeb.Keen.Client = new Keen($.extend({}, KeenLocalStorage.get(), {
		    protocol: "http"
		}));

		// debug mode also prints out JSON events to the console for inspection
		CommonWeb.Keen.Debug = true;

		CommonWeb.addGlobalProperties(CommonWeb.Keen.globalProperties);

		CommonWeb.Callback = CommonWeb.Keen.Callback;

	    </script>
		    
	    <script type="text/javascript">

		// Actual Tracking Configuration

		// track session with a GUID
		CommonWeb.trackSession();

		// track pageviews
		CommonWeb.trackPageview();

		// track link clicks
		CommonWeb.trackClicks();

		// track other elements, requires explicit elements to be passed
		CommonWeb.trackClicksPassive($("span.less"));

		// track other elements, adding additional properties
		CommonWeb.trackClicksPassive($("span.more-stuff"), { areWeHavingFunYet : true });

		// track other elements, adding additional properties that are a function
		CommonWeb.trackClicksPassive($("span.even-more-stuff"), function(event, element) {
		    return {
			event: { clientX : event.clientX },
			element: { tagNameAgain : element.tagName  }
		    };
		});

		// track form submissions
		CommonWeb.trackFormSubmissions();

		// track input changes
		CommonWeb.trackInputChanges();

	    </script>
	
	</body>
</html>	
