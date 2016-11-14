define(["require", "a"],
    function(require, a) {
        //"a" in this case will be null if a also asked for b,
        //a circular dependency.
        return function(title) {
            return require("a").doSomething(title);
        //  循环依赖的情况下，上面直接用a会报undefined。  如果不是循环依赖 则正常
        }
    }
);