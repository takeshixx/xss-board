// author: takeshix@adversec.com
var zombie = require("zombie");
var bot = new zombie();
bot.cookies("localhost","/index.php").set("PHPSESSID", "mag1c_c00k1e");
bot.visit("http://localhost:83/", {debug: true}, function(err,browser){
	browser.
		fill("user", "admin").
		fill("comment", "hilarious!").
		pressButton("Post it!", function(){})
});


