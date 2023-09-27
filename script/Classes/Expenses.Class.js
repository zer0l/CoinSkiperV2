export default class ExpensesClass{
    constructor(){}

    Add(IDWallet,IDCategory,Sum){
        if(typeof Sum === 'number'){
            console.log(`${IDWallet} - ${IDCategory} - ${Sum}`)
        }else{
            console.log("Ошибка! Некоректно указана сумма!")
        }
        
    }
}
