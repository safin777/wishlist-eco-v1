var productDetailPageWithBenefits = {
    init: function () {
        this.mainCss();
        this.mainJS();
    },
    mainCss: function () {
        var s = document.createElement("style");
        s.setAttribute("type", "text/css");
        document.head.appendChild(s).textContent =
            "" +
            ".progress-bar__container {" +
            "width: 80%;" +
            "height: 2rem; " +
            "height: 2rem;" +
            "border-radius: 2rem;" +
            "position: relative;" +
            "overflow: hidden;" +
            "transition: all 0.5s;" +
            "will-change: transform;" +
            "box-shadow: 0 0 5px #e76f51;" +
            "}" +
            "";
    },
    mainJS: function () {
        const progressbarAdd = () => {
            
            // alert(min, max);
            let cart = document.querySelector(".js-contents");

            let progressbar = `
            <div class="progress_container">
                <progress id="progress_cart" value="0" max="100"></progress> <span id="progress_percent"> 100%</span>
            </div>`;
            cart.insertAdjacentHTML("afterbegin", progressbar);

            let pro = document.querySelector("#progress_cart");
            if (pro) {
                let max = 50;
                let low = 0;
                
                let get_subtotal = document.querySelector(
                    ".totals__subtotal-value"
                ).innerText;
                //slice a string to get the number
                let subtotal = get_subtotal.slice(2, -3);
                let percent = (subtotal / max) * 100;
                let percent_round = Math.round(percent);
                if (subtotal > max) {
                    pro.value = 100;
                    document.querySelector("#progress_percent").innerText =
                        "100%";
                } else if (subtotal < low) {
                    pro.value = 0;
                    document.querySelector("#progress_percent").innerText =
                        "0%";
                } else {
                    pro.value = percent_round;
                    document.querySelector("#progress_percent").innerText =
                        percent_round + "%";
                }
            }
        };

        progressbarAdd();

        let observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                //document.querySelector("#progress_cart").remove();
                //adding this function after 2second to make sure the cart is loaded
                let btn = document.querySelectorAll(".quantity__button");
                // make  event listener for each button
                btn.forEach((item) => {
                    item.addEventListener("click", function () {
                        let mak = document.querySelectorAll(
                            ".progress_container"
                        );
                        mak[0].remove();
                    });
                });
                progressbarAdd();
            });
        });
        let target = document.querySelector(".cart__items");

        observer.observe(target, { childList: true, attributes: true });
    },
};

(function pollForWithBenefits() {
    if (document.getElementsByClassName("js-contents")) {
        try {
            productDetailPageWithBenefits.init();
            console.log("Variation- A: 01");
        } catch (error) {
            console.log("Initialization error:", error);
        }
    } else {
        setTimeout(pollForWithBenefits, 25);
    }
})();
