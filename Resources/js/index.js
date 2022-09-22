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
};



document.addEventListener("DOMContentLoaded", function(event) {
    reduceHeader(".companyImage");

    const setFocusHandler = setFocus('.cards');
    setFocusHandler();
    window.addEventListener('orientationchange', setFocusHandler)

    const burger = document.querySelector('.burger__iconContainer');
    burger.addEventListener('click', burgerToggle);
});

