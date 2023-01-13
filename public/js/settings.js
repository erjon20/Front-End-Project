const selectedSetting = () => {
    const allSettings = document.querySelectorAll(".setting");
    const allDisplayedSettings = document.querySelectorAll(".settings_display");

    // console.log(allSettings);
    // console.log(allDisplayedSettings);

    allSettings.forEach( link => {
        link.addEventListener("click", () => {
            allSettings.forEach((link) => {
                link.classList.remove("ActiveSetting");
            });
            link.classList.add("ActiveSetting");
            tmp1 = "Details";
            console.log((link.textContent == "Details"));

            switch(tmp1) {
                case "Details":
                  console.log("HI");
                  break;
                default:
                  console.log("Bye");
              }
            // switch (link.textContent.toLowerCase()) {
            //     case tmp1:
            //       console.log("D");
            //         // changeDisplay(
            //         //     allDisplayedSettings,
            //         //     link.textContent.toLowerCase()
            //         // );
                    
            //         break;

            //     case "Payment":
            //         // changeDisplay(
            //         //     allDisplayedSettings,
            //         //     link.textContent.toLowerCase()
            //         // );
            //         console.log("P");
            //         break;
            //     case "Baroque":
            //         changeDisplay(
            //             allDisplayedSettings,
            //             link.textContent.toLowerCase()
            //         );
            //         break;

            //     default:
            //       console.log("Default");
            //         break;
            // }
        });
    });
};

// function changeDisplay(displayedGalleries, name) {
//     displayedGalleries.forEach((element) => {
//         if ($(element).hasClass(name)) {
//             element.style.display = "flex";
//         } else {
//             element.style.display = "none";
//         }
//     });
// }

// const addToFavorites = () => {
//     const likeThis = document.querySelectorAll(".notLiked");

//     likeThis.forEach((button, index) => {
//         button.addEventListener("click", () => {
//             button.classList.toggle("liked");
//         });
//     });
// };

// addToFavorites();
// selectedSetting();

const allSettings = document.querySelectorAll(".setting");
const allDisplay = document.querySelectorAll(".settings_display");

function settingChange(){
    allSettings.forEach( link => {
        link.addEventListener("click", () => {
            allSettings.forEach((link) => {
                link.classList.remove("ActiveSetting");
            });
            link.classList.add("ActiveSetting");
        });
    });
}

function tabs(currentDisplay) {
    allDisplay.forEach(element => {
        element.style.display = "none";
    });
    allDisplay[currentDisplay].style.display = "block";
}

tabs(0);

settingChange();
