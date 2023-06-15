const innerContaoner = document.querySelector('.inner');
const btn_1 = document.querySelector('.btn');
const btn_2 = document.querySelector('.btn');
const api = "http://localhost/SDO_2023/task/task.php";



async function read (){
    try{
        let response = await fetch(api);

        if (response.ok) { // если HTTP-статус в диапазоне 200-299
        // получаем тело ответа (см. про этот метод ниже)
        let answer = await response.text();
        console.log["Ответ" + answer]
        textFromServer = answer;
        } else {
        alert("Ошибка HTTP: " + response.status);
        }
    }
    catch (error) {
        console.log("Ошибка при выполнении запроса: " + error.message);
    }
    
}
read()


