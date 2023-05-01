<!DOCTYPE html>
<html>
<head>
    <title>First Aid Chatbot</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #chat-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }

        #chat-container h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0 0 20px;
            text-align: center;
        }

        .chat-message {
            margin-bottom: 10px;
            overflow-wrap: break-word;
            padding: 10px;
            border-radius: 10px;
        }

        .user-message {
            background-color: #b3daff;
            text-align: right;
        }

        .bot-message {
            background-color: #fff;
            text-align: left;
        }

        .chat-input {
            display: flex;
        }

        .chat-input input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .chat-input button {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            margin-left: 10px;
            cursor: pointer;
        }

        input[type="text"] {
            caret-color: auto;
        }
    </style>
</head>
<body>
    <div id="chat-container">
        <h1>First Aid Chatbot</h1>
        <div id="chat-log">
            <div class="bot-message chat-message">Bot: Hello! I'm a first aid chatbot. How can I help you today?</div>
        </div>
        <form id="chat-form" method="post">
            <div class="chat-input">
                <input type="text" id="message" name="message" required autofocus>
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
</body>
</html>

    </div>
    <script>
const form = document.querySelector('#chat-form');
const chatLog = document.querySelector('#chat-log');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  const input = document.querySelector('#message').value;

  // Create user message element with "you" label
  const userMessageContainer = document.createElement('div');
  const userLabel = document.createElement('span');
  userLabel.textContent = 'You: ';
  userMessageContainer.appendChild(userLabel);
  const userMessageEl = document.createElement('span');
  userMessageEl.textContent = input;
  userMessageContainer.appendChild(userMessageEl);
  userMessageContainer.classList.add('user-message', 'chat-message');
  chatLog.appendChild(userMessageContainer);

  // Send user message to server to get response
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'response.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = xhr.responseText;

      // Create bot message element with "bot" label
      const botMessageContainer = document.createElement('div');
      const botLabel = document.createElement('span');
      botLabel.textContent = 'Bot: ';
      botMessageContainer.appendChild(botLabel);
      const botMessageEl = document.createElement('span');
      botMessageEl.textContent = response;
      botMessageContainer.appendChild(botMessageEl);
      botMessageContainer.classList.add('bot-message', 'chat-message');
      chatLog.appendChild(botMessageContainer);

      document.querySelector('#message').value = '';
    }
  };

  // Check user message for keyword(s) before sending to server
  const keywords = ['hello', 'hi', 'hey', 'howdy'];
  const inputWords = input.toLowerCase().split(' ');
  let containsKeyword = false;

  for (let i = 0; i < inputWords.length; i++) {
    if (keywords.includes(inputWords[i])) {
      containsKeyword = true;
      break;
    }
  }

  if (containsKeyword) {
    xhr.send(`message=${encodeURIComponent(input)}&keyword=true`);
  } else {
    xhr.send(`message=${encodeURIComponent(input)}`);
  }
});



    </script>
    </body>
    </html>
