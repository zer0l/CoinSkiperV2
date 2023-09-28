import RenderClass from "./Classes/Render.Class.js";
import Handlers from './Handlers.js';

let Render = new RenderClass();

const App = async ()=>{

  fetch('backend/api/Wallet/Select/Wallets.php')
  .then((response) => {
    return response.json();
  })
  .then((Wallets) => {
    fetch('backend/api/Category/Select/Сategories.php')
    .then((response) => {
      return response.json();
    })
    .then((Category) => {

      Wallets.forEach(el => document.querySelector('#WalletsBlock').insertAdjacentHTML('beforeend',`<div class="block">${Render.Wallet(el.name,el.id,el.balance)}</div>`));
      Category.forEach(el => document.querySelector('#ExpensesBlock').insertAdjacentHTML('beforeend',`<div class="block">${Render.Category(el.name,el.id,el.sum)}</div>`));

    }) 
  }) 

} 

App();
Handlers();
