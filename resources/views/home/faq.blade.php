<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset ('css/css_file.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MSOS | FAQ</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <style>
     
        .faq-section {
            margin: 20px 0;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .faq-section h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .faq-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-question:hover {
            color: #007BFF;
        }

        .faq-answer {
            display: none;
            margin-top: 10px;
            line-height: 1.6;
            color: #555;
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-icon.rotate {
            transform: rotate(180deg);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            
            .faq-section h1 {
                font-size: 20px;
            }

            .faq-question {
                font-size: 16px;
            }

            .faq-answer {
                font-size: 14px;
            }
        }

                
@media (max-width: 480px) {
    .faq-section {
                margin-top: 15%;
            }
}
    </style>
</head>
<body>
    <div class="container">
        @include('includers.mobile_back_header')
        @include('includers.user_header')

        <!-- FAQ Section -->
        <div class="faq-section">
            <h1>Frequently Asked Questions</h1>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Is this the final System?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Note: This system is currently in its first version, which means exciting improvements 
                    in UI and added functionalities are on the way! 
                    Stay tuned for updates as we continue to enhance your experience.                   
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>What is Tracker or Track order option?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Tracker is an advanced order tracking feature within our shop that 
                    keeps you informed every step of the way. Whether it's your order or a friend's, 
                    Tracker provides real-time updates on the current location and status of 
                    your purchase, ensuring you stay in the loop effortlessly.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I Track my order?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    You can track your order by entering your Order ID on the tracking page or
                    go to your purchases and select the order you want to track and press the
                    View Tracking.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Do you offer international shipping?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    No, This shop is intended within the Campus.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How Can I Start Selling?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Please refer to the Link embedded to start selling.
                    <a href="{{url('start_sell')}}" style="color: blue"> Click Here</a>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How can I contact customer support?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Please refer to the Link embedded to redirect to our FB Page.
                    <a href="https://www.facebook.com/profile.php?id=100086240330686" style="color: blue"> Click Here</a>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Can I provide feedback or reviews on products?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    As for the version 1 this feature is not available, but the developers
                    is currently on it.
                </div>
            </div>


            <div class="faq-item">
                <div class="faq-question">
                    <span>Are there additional charges?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Depends on the seller account, But yes additional charges may apply.
                </div>
            </div>

        </div>
    </div>

    <script>
        // JavaScript to toggle FAQ answers
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('.faq-icon');

                // Toggle visibility of the answer
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                    icon.classList.remove('rotate');
                } else {
                    answer.style.display = 'block';
                    icon.classList.add('rotate');
                }
            });
        });
    </script>

<div class="d_hide">
        <br><br><br>
    </div> 
    <footer class="floating-footer">
        <div class="footer-links">
            <a href="{{url('dashboard')}}" >
                <i class="fa-solid fa-house"></i>
                <p class="footer_p">Home</p>
            </a>
            <a href="{{url('seller_department')}}"  >
                <i class="fa-solid fa-shop"></i>
                <p class="footer_p" >Shops</p>

            </a>
            <a href="{{url('search-order')}}">
                <i class="fa-solid fa-earth-americas"></i>
                <p class="footer_p">Tracker</p>

            </a>
            <a href="{{url('user_page')}}" class="active" >
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer>
</body>
</html>
