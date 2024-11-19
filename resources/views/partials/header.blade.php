<head>
    <script src="https://kit.fontawesome.com/8724a9ccea.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        ul {
            list-style: none;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: white;
        }

        header {
            display: flex;
            font-family: Arial, Helvetica, sans-serif;
            width: 100vw;
            padding: 2px;
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: black;
            justify-content: space-between;
            align-items: center;
            font-size: 1.3rem;
            color: white;
        }

        #header {
            position: sticky;
            top: 0;
            z-index: 1000;
            padding-bottom: 0;
        }

        #rightHeader {
            margin-bottom: auto;
            margin-top: auto;
            display: flex;
            justify-content: start;
            justify-self: start;
        }

        #iconHeader a {
            display: flex;
            gap: 20px;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            justify-self: center;
            font-size: 1rem;
            text-align: center;
            padding-right: 20px;
            color: white;
        }

        #iconHeader h3 {
            font-size: 2rem;
        }

        #iconHeader a:hover {
            color: white;
        }

        #chaldeaLogo {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        #selectionHeader {
            display: flex;
            margin-top: auto;
            margin-bottom: auto;
            justify-content: end;
            justify-self: end;
            gap: 20px;
            padding-right: 15px;
        }

        #selectionHeader li:hover {
            color: white;
            text-decoration: underline;
            cursor: pointer;
        }

        .overlayMenu {
            display: none;
            position: absolute;
            top: 64%;
            right: 110px;
            width: 300px;
            background-color: whitesmoke;
            color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            z-index: 1000;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .selectionItem:hover .overlayMenu {
            display: flex;
            background-color: black;
            color: white;
            align-items: center;
        }

        .selectionItem:hover::after {
            display: none;
        }

        #searchHeader {
            display: none;
            opacity: 0;
            top: 0;
            flex-direction: column;
            padding-top: 0;
            position: sticky;
            z-index: 1000;
        }

        #searchDiv {
            display: flex;
            position: relative;
            height: auto;
            padding-left: 0;
            align-items: center;
            transition: opacity 0.1s ease-in-out;
            font-size: 1.75rem;
        }

        #searchInput {
            padding-left: 10px;
            outline: none;
            border-color: transparent;
            color: white;
            height: auto;
            width: 90vw;
            font-size: 1.75rem;
            background-color: transparent;
        }

        #productContainerSearch {
            display: none;
            position: sticky;
            top: 0;
            z-index: 10000;
            justify-content: center;
            align-items: center;
            margin-top: 19.5px;
            width: 100vw;
            padding: 20px;
            position: relative;
            background-color: black;
            flex-wrap: wrap;
            gap: 20px;
        }

        .productSearch {
            top: 0;
            position: sticky;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: black;
            padding: 10px;
            border: 1px solidwhite;
            width: 200px;
            transition: background-color 0.3s;
        }

        .productSearch:hover {
            color: black;
            background-color: white;
        }

        .productSearch:hover h3 {
            color: black;
        }

        .productSearch img {
            display: flex;
            width: 100px;
            height: 100px;
            margin: auto;
        }

        .productInfoSearch {
            text-align: center;
            margin-top: 10px;
        }

        #noResult {
            display: none;
            position: sticky;
            top: 0;
            z-index: 1000;
            text-align: center;
            font-size: 1.5rem;
            color: white;
        }

        #menuToggleDiv {
            display: none;
        }

        #menuToogle {
            display: none;
        }

        #sidebarMenu {
            display: none;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            width: 80vw;
            height: 100vh;
            background-color: black;
            z-index: 10000;
            padding: 20px;
            padding-top: 10px;
            color: white;
        }

        #closeSidebar {
            font-size: 3rem;
            cursor: pointer;
            text-align: left;
            border-bottom: white solid 2px;
        }

        #sidebarMenu ul {
            padding: 20px 0;
        }

        .menuItem {
            display: flex;
            width: 50vw;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .caretText {
            display: flex;
            gap: 10px;
            justify-content: start;
            align-items: center;
            border-bottom: white 1px solid;
        }

        #sidebarMenu li {
            font-size: 1.5rem;
            cursor: pointer;
        }

        #sidebarMenu li:hover {
            color: white;
        }

        .fa-caret-up {
            display: none;
        }

        .dropDownContent {
            display: none;
        }

        .dropDownContent ul a {
            display: flex;
            margin-left: 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 900px) {
            #menuToggleDiv {
                display: flex;
            }

            #selectionHeader .selectionItem {
                display: none;
            }

            #selectionHeader {
                display: flex;
                flex-wrap: wrap;
                justify-content: end;
            }

            #sidebarMenuIcon {
                display: block;
            }

            #iconHeader {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            #iconHeader h3 {
                display: none;
            }

            .sign-in-direction {
                color: black
            }

            .sign-in-direction:hover {
                color: gray
            }
        }
    </style>
</head>
<header>
    <div id="menuToggleDiv">
        <i class="fa-solid fa-bars" id="menuToggle"></i>
    </div>
    <div id="rightHeader">
        <div id="iconHeader">
            <a href="../../html/homepage/homepage.html">
                <image id="chaldeaLogo" src="/images/gg.png"></image>

                <h2>GatGate</h2>
            </a>
        </div>
    </div>
    <ul id="selectionHeader">
        <li class="selectionItem">
            Collections
            <div class="overlayMenu">
                <ul>
                    <a href="../../html/category/audio.html">
                        <li>Audio</li>
                    </a>
                    <a href="../../html/category/watch.html">
                        <li>Watch</li>
                    </a>
                    <a href="../../html/category/bags.html">
                        <li>Bags</li>
                    </a>
                </ul>
            </div>
        </li>
        <i class="fa-solid fa-magnifying-glass" id="mainSearchGlassLogo"></i>
        <a href="../../html/login/login.html"><i class="fa-solid fa-user"></i></a>
    </ul>
</header>
<div id="sidebarMenu">
    <div id="closeSidebar">&times;</div>
    <ul>
        <li class="menuItem">
            <div class="caretText">
                Collections
                <i class="fa-solid fa-caret-down caretIcon"></i><i class="fa-solid fa-caret-up caretIcon"></i>
            </div>
            <div class="dropDownContent">
                <ul>
                    <a href="../../html/category/audio.html">
                        <li>Audio</li>
                    </a>
                    <a href="../../html/category/watch.html">
                        <li>Watch</li>
                    </a>
                    <a href="../../html/category/bags.html">
                        <li>Bags</li>
                    </a>
                </ul>
            </div>
        </li>
    </ul>
</div>

<header id="searchHeader">
    <div id="searchDiv">
        <i class="fa-solid fa-magnifying-glass" id="searchGlassLogo"></i>
        <input id="searchInput" type="search" spellcheck="false" placeholder="SEARCH FOR ..." />
    </div>
    <div id="productContainerSearch"></div>
    <div id="noResult">No Result</div>
</header>

<script>
    const searchGlassLogo = document.getElementById("mainSearchGlassLogo");
    const searchHeader = document.getElementById("searchHeader");
    const menuToggle = document.getElementById("menuToggle");
    const sidebarMenu = document.getElementById("sidebarMenu");
    const sidebarClose = document.getElementById("closeSidebar");
    
    searchGlassLogo.addEventListener("click", () => {
    clickSearchIcon(true);
    const searchInput = document.getElementById("searchInput");
    searchInput.focus();
    });
    
    searchInput.addEventListener("input", () => {
    search(searchInput.value.trim());
    });
    
    document.addEventListener("click", (e) => {
    if (!searchHeader.contains(e.target) && e.target !== searchGlassLogo) {
    clickSearchIcon(false);
    }
    });
    menuToggle.addEventListener("click", () => {
    sidebarMenu.style.display = "flex";
    });
    
    sidebarClose.addEventListener("click", () => {
    sidebarMenu.style.display = "none";
    });
    
    $(".menuItem").click(() => {
    $(".dropDownContent").slideUp();
    $(".fa-caret-up").hide();
    $(".fa-caret-down").show();
    
    var content = $(this).find(".dropDownContent");
    if (content.is(":visible")) {
    content.slideUp();
    } else {
    $(".caretText").css({
    color: "white",
    "border-bottom": "white 1px solid",
    });
    content.slideDown();
    $(this).find(".fa-caret-up").show();
    $(this).find(".fa-caret-down").hide();
    }
    });
    
    function clickSearchIcon(searchIcon) {
    var searchHeader = document.getElementById("searchHeader");
    
    if (
    searchIcon === true &&
    (searchHeader.style.display === "none" ||
    searchHeader.style.opacity === "0" ||
    searchHeader.style.display === "")
    ) {
    $("#searchHeader")
    .slideDown()
    .css({ display: "flex", zIndex: "0", height: "75px", opacity: "1" });
    } else {
    $("#searchInput").val("");
    
    $("#searchHeader").slideUp();
    
    $("#productContainerSearch").hide();
    $("#noResult").hide();
    }
    }
    
    function search(input) {
    const productContainer = document.getElementById("productContainerSearch");
    const noResult = document.getElementById("noResult");
    noResult.style.display = "";
    
    console.log(input);
    
    productContainer.innerHTML = "";
    let foundProducts = productsSearch.filter((product) =>
    product.name.toLowerCase().includes(input.toLowerCase())
    );
    
    if (foundProducts.length > 0) {
    $("#productContainerSearch").show().css({ display: "flex" });
    $("#noResult").hide();
    foundProducts.forEach((product) => {
    productContainer.innerHTML += `
    <div class="productSearch">
        <a href="${product.page}">
            <img src="${product.img}" alt="${product.name}" />
            <div class="productInfoSearch">
                <h3>${product.name}</h3>
            </div>
        </a>
    </div>
    `;
    });
    } else {
    $("#noResult").show();
    }
    
    if (!input) {
    $("#productContainerSearch").hide();
    $("#noResult").hide();
    }
    }
</script>