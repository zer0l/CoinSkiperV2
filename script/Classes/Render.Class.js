export default class RenderClass{
    constructor(){}

    Wallet(Name,ID,Balance){
        return `
        <span class="text">${Name}</span>
        <div class="circle wallet" data-wallet="${ID}"></div>
        <span class="text">${Balance} Р.</span>
        `;
    }

    Category(Name,ID,Sum){
        return `
        <span class="text">${Name}</span>
        <div class="circle expenses" data-category="${ID}"></div>
        <span class="text">${Sum} Р.</span>
        `;
    }
}
