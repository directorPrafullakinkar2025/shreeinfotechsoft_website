<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Course Enquiry Form</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f7fb;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            width:420px;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 5px 15px rgba(0,0,0,0.15);
        }

        h2{
            text-align:center;
            color:#1f4e79;
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-top:15px;
            margin-bottom:6px;
            font-weight:bold;
        }

        input, select, textarea{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
            font-size:15px;
        }

        textarea{
            resize:vertical;
        }

        button{
            width:100%;
            margin-top:20px;
            padding:12px;
            background:#1f4e79;
            color:white;
            border:none;
            border-radius:5px;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#163b5c;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Programming Course Enquiry</h2>

    <form action="submit_enquiry.php" method="POST">

        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>

        <label>Select Course</label>
        <select name="course" required>
            <option value="">-- Select Course --</option>
            <option>Python</option>
            <option>Java</option>
            <option>C Programming</option>
            <option>C++</option>
            <option>C#</option>
            <option>JavaScript</option>
            <option>PHP</option>
            <option>React JS</option>
            <option>Node JS</option>
            <option>Angular</option>
            <option>Data Science</option>
            <option>Machine Learning</option>
            <option>Full Stack Development</option>
        </select>

        <label>Mobile Number</label>
        <input type="tel"
               name="mobilenumber"
               pattern="[0-9]{10}"
               maxlength="10"
               placeholder="Enter 10-digit mobile number"
               required>

        <label>Your Question</label>
        <textarea name="question"
                  rows="5"
                  placeholder="Type your question here..."
                  required></textarea>

        <button type="submit">Submit Enquiry</button>

    </form>

</div>

</body>
</html>