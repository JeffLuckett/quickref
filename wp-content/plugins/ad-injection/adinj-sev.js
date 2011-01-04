/*
Part of the Ad Injection plugin for WordPress
http://www.reviewmylife.co.uk/blog/
*/

// Based on code from 
// http://www.scratch99.com/2008/09/avoid-smart-pricing-show-adsense-only-to-search-engine-visitors/
function adinj_searchenginevisitor(){
	if (adinj_searchEngineCookieSet()){
		return true;
	}
	var searchengines = adinj_searchengines();
	for (var i = 0; i <= searchengines.length-1; i++) {
		if (document.referrer.indexOf(searchengines[i])!== -1) {
			var expiry = new Date();
			expiry.setTime(expiry.getTime() + 1000*60*60); // 1 hour
			document.cookie = "adinj=1; expires=" + expiry.toGMTString() + "; path=/; ";
			return true;
		}
	}
	return false;
}

function adinj_searchengines(){
	if (typeof adinj_referrers != 'undefined'){
		return adinj_referrers;
	} else {
		document.write("<!--ADINJ DEBUG: couldn't find adinj_referrers value. Using defaults.//-->");
		return new Array('.google.', '.bing.', '.yahoo.', '.ask.', 'search?', 'search.', '/search/');
	}
}

function adinj_searchEngineCookieSet() {
	var results = document.cookie.match('(^|;) ?adinj=([^;]*)(;|$)');
	if(results){
		return true;
	}
	return false;
}

