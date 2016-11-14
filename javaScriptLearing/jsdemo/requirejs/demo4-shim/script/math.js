var MyMath = (function () {
	var count = 1;
	function add(num1,num2) {
		console.log(count++);
		return num1 + num2;
	}
	return {
		add: add
	}
})();