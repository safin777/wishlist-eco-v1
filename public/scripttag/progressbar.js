
var productDetailPageWithBenefits = {
    init: function () {
        this.mainCss();
        this.mainJS();
    },
    mainCss: function () {
        var s = document.createElement("style");
        s.setAttribute("type", "text/css");
        document.head.appendChild(
            s
        ).textContent = `.container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
          }
          
          .progress-bar__container {
            width: 80%;
            height: 2rem;
            border-radius: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.5s;
            will-change: transform;
            box-shadow: 0 0 5px #e76f51;
          }
          
          .progress-bar {
            position: absolute;
            height: 100%;
            width: 100%;
            content: "";
            background-color: #e76f51;
            top:0;
            bottom: 0;
            left: -100%;
            border-radius: inherit;
            display: flex;
            justify-content: center;
            align-items:center;
            color: white;
            font-family: sans-serif;
          }
          
          .progress-bar__text {
            display: none;
          }
          `;
    },
    mainJS: function () {
        
        let cart = document.querySelector("p");
        let progressbar = `<div class="container">
        <div class="progress-bar__container">
          <div class="progress-bar">
            <span class="progress-bar__text">Uploaded Successfully!</span>
          </div>
        </div>
      </div>`;
     cart.insertAdjacentElement("afterbegin", progressbar);
    },
};

(function pollForWithBenefits() {
    if (document.getElementsByClassName("product__title")) {
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
