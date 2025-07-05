<div id='infoemp' style="text-align:center;width:100%">
    <?php
    echo $_SESSION['emp_no']; 
    ?>
    <br>
    </br>
    <?php
    echo $_SESSION['emp_name']; 
    ?>
    <br>
    </br>
    <?php 
   echo $_SESSION['email_emp']; 
   ?>
   </div>
    <br>
    <br>
    <h2 class="a" style="text-align: center">Registration of leave</h2>
    <br>
    <br>
    <br>
    <script>
        $(document).ready(function () {
            $("#leave_type").keyup(function () {
                var length = $(this).val().length;
                if (length >= 3) {
                    $("#fileup").show().prop('disabled', false);;
                }
                else if (length <= 2) {
                    $("#fileup").hide().prop('disabled', true);
                }

            });
        });
    </script>
    <h2 class="a" style="text-align: center"><a href="user_data.php"><input type="submit"
                value="View Laeve"></input></a></strong></p>
    </h2>
    <div style="text-align:center;width:100%">
        <table align="center" border='1' width='50%'>
            <b>
                <form id='fromsm' name="addleave" method='POST' action="insert_leave.php" enctype="multipart/form-data" target="iframe_target">
<iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <br> EMPLOYEE OF LEAVE <br><br>
                    วันที่เขียน
                    <br>
                    <input type="date" class="form-control" name="leave_day" value=''></input>
                    <br>
                    </br>
                    ประเภทที่ลา
                    <br>
                    <input type="text" class="leave_type" name="leave_type" value='' id='leave_type' autocomplete=off
                        maxlength="45"></input>
                    <br>
                    </br>
                    <input type="file" name="file_up" require accept="fileupload/" autocomplete=off id="fileup"
                        style='display:none' ></input>
                    <br>
                    </br>
                    สาเหตุ
                    <br>
                    <textarea name="cause" value='' maxlength="100" word-wrap="virtual"></textarea>
                    <br>
                    </br>
                    เริ่มวันที่
                    <br>
                    <input type="date" name="first_leave" value=''></input>
                    <br>
                    </br>
                    ถึงวันที่
                    <br>
                    <input type="date" name="end_leave" value=''></input>
                    <br>
                    </br>
                    ชั่วโมง
                    <br>
                    <select name="sum_h" <label for="hour">ชั่วโมง</label>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <br>
                    </br>
                    ผู้แทนงาน
                    <br>
                    <input type="text" name="replacement_s" value='' maxlength="7"></input>
                    </br>
                    อีเมลผู้แทนงาน
                    <br>
                    <input type="text" name="replacement_email" id="replacement_email" value='' maxlength="7"></input>
                    <input id="employee_id" type="hidden" name="employee_id" value="<?php echo $_SESSION['Userid']; ?>">
                    <input id="email_emp" type="hidden" name="email_emp" value="<?php echo $_SESSION['email1']; ?>">
                    </br>
                    <input type="hidden" name="status_ss" value='กำลังดำเนินการ' id='status_ss'></input>
                    <br>
                    </br>
                    <input type="submit" value="Send" id='send'></input>
            </b>
    </div>
    <br>
    </br>
    </form>
    <br>
    </br>
    <p><strong><a href="logout.php"><input type="submit" value="Logout"></input></a></strong></p>
    <br>
    </br>
    </br>