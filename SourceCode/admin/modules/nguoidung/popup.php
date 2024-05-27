<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .popup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .popup {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .popup h2 {
            margin-top: 0;
        }

        .popup-buttons {
            margin-top: 20px;
            text-align: center;
        }

        .popup-buttons button {
            padding: 8px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-confirm {
            background-color: #4CAF50;
            color: white;
        }

        .btn-cancel {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>

<body>

    <div id="popup-container" class="popup-container">
        <div class="popup">
            <h2 id="popup-title">Bạn có chắc chắn muốn thêm, xóa hoặc sửa?</h2>
            <p id="popup-message">Xác nhận?</p>
            <div class="popup-buttons">
                <button id="btn-confirm" class="btn-confirm">Xác nhận</button>
                <button id="btn-cancel" class="btn-cancel">Không</button>
            </div>
        </div>
    </div>

    <script>
        // Định nghĩa một hàm rỗng để sử dụng cho cancelCallback
        function emptyFunction() {
            // Hàm này không thực hiện bất kỳ hành động nào
        }
        
        // Thay đổi hàm showPopup để sử dụng hàm rỗng cho cancelCallback
        function showPopup(title, message, confirmCallback, cancelCallback) {
            var popupContainer = document.getElementById('popup-container');
            var popupTitle = document.getElementById('popup-title');
            var popupMessage = document.getElementById('popup-message');
            var btnConfirm = document.getElementById('btn-confirm');
            var btnCancel = document.getElementById('btn-cancel');
        
            popupTitle.innerText = title;
            popupMessage.innerText = message;
        
            // Show the popup
            popupContainer.style.display = 'flex';
        
            // Add event listeners to buttons
            btnConfirm.onclick = function () {
                popupContainer.style.display = 'none';
                if (typeof confirmCallback === 'function') {
                    confirmCallback();
                }
            };
        
            btnCancel.onclick = function () {
                popupContainer.style.display = 'none';
                if (typeof cancelCallback === 'function') {
                    cancelCallback();
                }
            };
        }
        
        // Sử dụng hàm showPopup với cancelCallback là hàm rỗng
        showPopup("Xác nhận", "Bạn có chắc chắn muốn thực hiện hành động này?", handleConfirm, emptyFunction);
  
    
    </script>

</body>

</html>