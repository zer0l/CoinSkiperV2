import RenderClass from "./Classes/Render.Class.js";
import ExpensesClass from "./Classes/Expenses.Class.js";

let Expenses = new ExpensesClass();
let Render = new RenderClass();

export default function Handlers(){
    let SelectedWallet = 0;

    document.addEventListener('click',(e)=>{
        if(e.target.classList.contains("wallet")){
          if(SelectedWallet === 0){
            SelectedWallet = e.target.dataset.wallet;
            e.target.classList.toggle("wallet-active");
            return;
          }
          if(SelectedWallet === e.target.dataset.wallet){
            document.querySelectorAll('.wallet-active').forEach(element => {
              element.classList.toggle("wallet-active");
            })
            SelectedWallet = 0;
            return;
          }
          else{
            document.querySelectorAll('.wallet-active').forEach(element => {
              element.classList.toggle("wallet-active");
            })
            SelectedWallet = e.target.dataset.wallet;
            e.target.classList.toggle("wallet-active");
          }
        }
      
        if(e.target.classList.contains("expenses")){
          if(SelectedWallet != 0){
            let IDCategory = e.target.dataset.category;
            // Здесь вызов модалки
            let Sum = prompt(`Выбранный кошелек : ${SelectedWallet}. Выбранная категория : ${IDCategory}`,""); 
            // ------
            // Добавление расходов
            Expenses.Add(SelectedWallet,IDCategory,Sum);
            // Сброс выбранных кошельеов
            document.querySelectorAll('.wallet-active').forEach(element => {
              element.classList.toggle("wallet-active");
            })
            SelectedWallet = 0;
            return;
      
          }else{
            alert("Откроется модальное окно с подробными расходами")
          }
        }
    })
}