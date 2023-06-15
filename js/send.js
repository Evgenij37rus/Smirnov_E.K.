const innerContaoner = document.querySelector('.inner');
const btn_1 = document.querySelector('.btn');
const btn_2 = document.querySelector('.btn');
const api = "http://localhost/SDO_2023/task/http://localhost/SDO_2023/task/add_task.php";



async function send (){
  try{
      let response = await fetch(api, {
        method: 'POST',
      body: new FormData(document.forms[0])
      });
      if (response.ok) { // если HTTP-статус в диапазоне 200-299
      // получаем тело ответа (см. про этот метод ниже)
      let answer = await response.text();
      console.log["Ответ" + answer]
      textFromServer.innerHTML = answer;
      } 
      else 
      {
        alert("Ошибка HTTP: " + response.status);
      }
    }
  catch (error) 
  {
    console.log("Ошибка при выполнении запроса: " + error.message);
  }
  
}
send ()
