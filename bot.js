var Browser = require("zombie");
var assert  = require('assert');
Browser.localhost('localhost', 80);
var browser = Browser.create();

browser.setCookie({name: "PHPSESSID", value: "mag1c_c00k1e"});
browser.visit("/index.php", {debug: true}, function(error){
    assert.ifError(error);
        browser.
                fill("user", "admin").
                fill("comment", "hilarious!").
                pressButton("Post it!", function(error){
            assert.ifError(error);
        })
});

