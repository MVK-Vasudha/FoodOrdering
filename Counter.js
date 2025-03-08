
        var increment = document.getElementsByClassName('incr');
        var decrement = document.getElementsByClassName('decr');
        console.log(increment);
        console.log(decrement)
        for (var i = 0; i < increment.length; i++) {
            var button = increment[i];
            button.addEventListener('click', function (event) {
                var buttonClicked = event.target;
                console.log(buttonClicked)
                var input = buttonClicked.parentElement.children[1];
                console.log(input);
                var inputValue = input.value;
                console.log(inputValue)
                var newValue = parseInt(inputValue) + 1;
                input.value = newValue
            })
        }
        for (var i = 0; i < decrement.length; i++) {
            var button = decrement[i];
            button.addEventListener('click', function (event1) {
                var buttonClicked = event1.target;
                console.log(buttonClicked)
                var input = buttonClicked.parentElement.children[1];
                console.log(input);
                var inputValue = input.value;
                console.log(inputValue)
                var newValue = parseInt(inputValue) - 1;
                input.value = newValue
            })
        }

    