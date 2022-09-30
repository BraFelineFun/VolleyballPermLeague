function setFocus(selector){


    //Получаем сам контейнер и всех его детей
    const cardHolder = document.querySelector(selector);
    if (cardHolder === null) return () => {};

    const cards = [];
    cardHolder.childNodes.forEach((card) => {

        if (card instanceof HTMLDivElement)
            cards.push(card);
    });

    return () => {
        if (window.innerWidth > 860) {
            window.removeEventListener('scroll', _setFocus);
            return;
        }


        //Создаем слушатель события прокрутки
        window.addEventListener('scroll', _setFocus)


        function isElementCompletelyInViewPort(element) {
            //Полностью ли вмещается элемент в видимую область

            let elementData = element.getBoundingClientRect(),
                width = document.documentElement.clientWidth,
                height = document.documentElement.clientHeight;

            return (
                elementData.bottom <= height
                && elementData.right <= width
                && elementData.left >= 0
                && elementData.top >= 0);
        }

        function _setFocus(){
            cards.forEach((card) => {
                if (isElementCompletelyInViewPort(card))
                    card.classList.add('hovered');
                else
                    card.classList.remove('hovered');
            })
        }

    }
}

function burgerToggle(){
    const burger = document.querySelector('.burger__iconContainer');
    const wrapper = document.querySelector('.burger__wrapper')

    burger.classList.toggle('__activeMenuBurger');
    wrapper.classList.toggle('__activeMenuBurger');
}


function reduceHeader(selector){
    const img = document.querySelector(selector);
    const initHeight = img.height;

    window.addEventListener('scroll', (e) => {
        if (pageYOffset > document.documentElement.clientHeight / 2){
            img.height = 0;
        }
        else{
            img.height = initHeight;
        }

    })
}

function delayedMapShow(){
    try {
        const mapBox = document.querySelector(".mapBox");
        const button = document.querySelector('.mapBox input[type="button"]');

        button.addEventListener('click', () => {
            mapBox.classList.toggle('showed');
        })
    }
    catch (e){
        console.log("На странице отсутствует карта " + e);
    }
}

function cardExpansion(buttonSel, cardSel){
    const buts = document.querySelectorAll(buttonSel);
    const cards = document.querySelectorAll(cardSel);

    if (!(buts && cards) || (buts.length !== cards.length)) return;

    for(let i = 0; i < buts.length; i++){
        const but = buts[i];
        const card = cards[i];

        but.addEventListener("click", () => {
            card.classList.toggle('--expanded');
        })
    }
}

//Точка старта
document.addEventListener("DOMContentLoaded", function(event) {
    reduceHeader(".companyImage");
    const burger = document.querySelector('.burger__iconContainer');
    burger.addEventListener('click', burgerToggle);

    const body = document.querySelector('body');

    switch (body.getAttribute('pageName')){
        case 'news':{
            const setFocusHandler = setFocus('.blog__cards');
            setFocusHandler();
            window.addEventListener('orientationchange', setFocusHandler);
            cardExpansion(".cardExpand", ".blog__card");
            break;
        }

        case 'contacts':
            delayedMapShow();
            break;

        case 'index':{
            const setFocusHandler = setFocus('.cards');
            setFocusHandler();
            window.addEventListener('orientationchange', setFocusHandler);
            break;
        }


    }

});

