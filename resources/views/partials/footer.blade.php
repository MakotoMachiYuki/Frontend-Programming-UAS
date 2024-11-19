<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #footerContainer {
            display: flex;
            flex-direction: column;
        }

        #footer {
            background-color: black;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
            top: 0;
            z-index: 999;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li a {
            text-decoration: none;
            color: white;
            transition: color 0.2s;
        }

        ul li a:hover {
            color: white;
        }

        h3 {
            color: white;
        }

        .footerSection {
            flex: 1;
            justify-content: center;
            min-width: 200px;
            text-align: center;
            margin: 10px;
        }

        .about {
            text-align: justify;
        }

        .support,
        .explore {
            padding-left: 20px;
            text-align: left;
        }

        .footerSection h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .footerSection p,
        ul,
        form {
            margin-bottom: 10px;
        }

        .logos img {
            max-width: 60px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .footerSection form {
            display: flex;
            flex-direction: column;
        }

        .footerSection form input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .footerSection form button {
            padding: 10px;
            background-color: white;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .footerSection form button:hover {
            background-color: black;
            color: white;
            outline: white solid 2px;
        }

        #footerBottom {
            display: flex;
            background: black;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
            color: white;
        }

        #footerBottom p {
            margin: 0;
        }

        .sign-in-direction {
            color: black
        }

        .sign-in-direction:hover {
            color: gray
        }
    </style>
</head>
<div id="footerContainer">
    <footer id="footer">
        <div class="footerSection about">
            <h3>GatGate</h3>
            <div class="logos">
                <img src="../../images/homepage/gg.png" />
            </div>
            <p>Discover, Gear Up, Thrive – Your Tech and EDC Solution</p>
        </div>
        <div class="footerSection explore">
            <h3>Explore</h3>
            <ul>
                <li><a href="#">Community Offers</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Wholesale</a></li>
                <li><a href="#">Content Creators</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
        <div class="footerSection support">
            <h3>Support</h3>
            <ul>
                <li><a href="#">Returns</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="footerSection newsletter">
            <h3>Newsletter</h3>
            <p>Be the first to know about product launches and exclusive deals!</p>
            <form action="#">
                <input type="email" placeholder="E-mail" />
                <button type="submit">SUBSCRIBE</button>
            </form>
        </div>
    </footer>
    <div id="footerBottom">
        <p>&copy; 2024 - GatGate</p>
    </div>
</div>