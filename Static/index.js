document.addEventListener("DOMContentLoaded", () => {
    var massDeleteList = [];
    var checkBoxes = document.querySelectorAll('.delete-checkbox');
    checkBoxes.forEach( (checkbox) => {
        checkbox.checked = false;
        checkbox.addEventListener('change', function(){
            if(checkbox.checked){
                massDeleteList.push(checkbox.value);
            }
            else {
                var i = massDeleteList.indexOf(checkbox.value);
                if(i > -1){
                    massDeleteList.splice(i, 1);
                    console.log(massDeleteList);
                }
            }
        })
    })
    document.querySelector('#delete-product-btn').addEventListener('click', () => {
            fetch('index.php', {
                method: 'POST',

                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(massDeleteList)
            })
            .then(() => window.location.replace(''))
    })
});