const axios2 = require('axios');

export default {
    methods: {
        submitit: function () {
            let choices = this.setChoicesArray();
            if (!this.checkForCalculus(choices)) {
                alert('calculus must be one of the choices');
                return;
            }
            axios2.post('/api/test')
                .then(response => {
                    let data = response.data
                    console.log(data)
                })
                .catch(error => {
                    console.log('fetching data error')
                });
        },
        checkForCalculus: function (choices) {
            choices.forEach(element => {
                field = element.toLowerCase();
                if (field.includes('calculus')) {
                    console.log('we found calc');
                    return true;
                }
            });
            console.log('no cals');
            return false;
        },
        setChoicesArray: function () {
            let choicesArray = [];
            choicesArray.push(document.getElementById('choice1'));
            choicesArray.push(document.getElementById('choice2'));
            choicesArray.push(document.getElementById('choice3'));
            return choicesArray;
        }
    }
}
