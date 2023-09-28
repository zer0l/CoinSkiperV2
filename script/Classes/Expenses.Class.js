import RenderClass from "./Render.Class.js";

export default class ExpensesClass{
    constructor(){
        this.Render = new RenderClass();
    }

    Add(IDWallet,IDCategory,Sum){

        const formData = new FormData();
        formData.set('IDWallet', IDWallet);
        formData.set('IDCategory', IDCategory);
        formData.set('Sum', Sum);
        fetch('backend/api/Expenses/Add/Expenses.php', {
            method: 'POST',
            body: formData
        })
        .then((response) => {
            return response.json();
        })
        .then((result) => {
            let WalletParentBlock = document.querySelector(`[data-wallet="${IDWallet}"]`).parentNode;
            let CategoryParentBlock = document.querySelector(`[data-category="${IDCategory}"]`).parentNode;

            WalletParentBlock.replaceChildren();
            CategoryParentBlock.replaceChildren();
            result.Wallets.forEach(el => WalletParentBlock.insertAdjacentHTML('beforeend',`${this.Render.Wallet(el.name,el.id,el.balance)}`));
            result.Category.forEach(el => CategoryParentBlock.insertAdjacentHTML('beforeend',`${this.Render.Category(el.name,el.id,el.sum)}`));
        })
        
    }
}
