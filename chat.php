<style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url(images/download.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 1.2rem;
    }

    label {
        margin-bottom: 0.5rem;
    }

    input[type="text"] {
        padding: 0.5rem;
        font-size: 1.2rem;
        border: 2px solid #ccc;
        border-radius: 4px;
        width: 100%;
        max-width: 400px;
        box-sizing: border-box;
        margin-bottom: 1rem;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 0.5rem 1rem;
        font-size: 1.2rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #3e8e41;
    }
</style>
<p style="text-align: center;">Please enter your question on first aid below and our bot will provide you with helpful information😊.</p>
<form action="response.php" method="post">
    <label for="message">Enter your message: </label>
    <input type="text" id="message" name="message" placeholder="Type a keyword" required>
    <button type="submit">Send</button>
</form>


