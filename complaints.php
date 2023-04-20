<style>
  form {
    width: 50%;
    margin: 0 auto;
    border: 1px solid #ccc;
    padding: 20px;
  }
  label {
    display: block;
    margin-bottom: 5px;
  }
  input[type="text"],
  select,
  textarea,
  input[type="date"] {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    box-sizing: border-box;
    font-size: 16px;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }
  input[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>

<form method="post" action="submit_complaint.php">
  <label for="complaint_name">Complaint Name:</label>
  <input type="text" id="complaint_name" name="complaint_name" required>
<label for="complaint_type">Complaint Type:</label>
<select id="complaint_type" name="complaint_type">
<option value="Technical issues">Technical issues</option>
<option value="Accessibility">Accessibility</option>
<option value="Customer Care">Customer Care</option>
</select>

<label for="complaint_description">Complaint Description:</label>

  <textarea id="complaint_description" name="complaint_description" required></textarea>
<label for="date_created">Date Created:</label>
<input type="date" id="date_created" name="date_created" required>

  <input type="submit" value="Submit Complaint">
  &nbsp; &nbsp;<a href="view_status.php">View status</a>
</form> 