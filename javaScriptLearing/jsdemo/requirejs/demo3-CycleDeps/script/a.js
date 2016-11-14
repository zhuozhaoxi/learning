define(["require", "b"],
    function(require, b) {
    	function doSomething(msg) {
    		console.log(msg);
    	}
        return {
        	doSomething: doSomething
        }
    }
);