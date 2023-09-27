import WalletClass from "./Classes/Wallet.Class.js";
import ExpensesClass from "./Classes/Expenses.Class.js";

// let Wallets = new WalletClass();

// _Wallets = [];

// Wallets.Balance();
let Expenses = new ExpensesClass();
let Wallets = [];
let SelectedWallet = 0;


const App = async ()=>{

  fetch('backend/api/Wallet/Wallets.php')
  .then((response) => {
    return response.json();
  })
  .then((WalletsResult) => {
    WalletsResult.forEach(Wallet => Wallets.push(new WalletClass(Wallet)));

    fetch('backend/api/Category/Сategories.php')
    .then((response) => {
      return response.json();
    })
    .then((Category) => {

      Wallets.forEach(el => document.querySelector('#WalletsBlock').insertAdjacentHTML('beforeend',`
      <div class="block">
        <span class="text">${el.Name}</span>
        <div class="circle wallet" data-wallet="${el.ID}"></div>
        <span class="text">${el.Balance} Р.</span>
      </div>
      `))

      Category.forEach(el => document.querySelector('#ExpensesBlock').insertAdjacentHTML('beforeend',`
      <div class="block">
        <span class="text">${el.name}</span>
        <div class="circle expenses" data-category="${el.id}"></div>
        <span class="text">0 Р.</span>
      </div>
      `))
      
    }) 
  }) 

} 

App();

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