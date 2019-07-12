
   <html>
</head>
<body>
    
    
	<div style='position:absolute;top:0%;'>
        <div id="example" class="k-content">
			<font color=red><b>Note:</b></font>&nbsp;This Registration is also applicable to <b>SDCAC</b> Site in a few Days.So kindly Register.</font>
           
        <div id="tickets">
            <ul>
                <li>
                    <label for="Id no" class="required">ID NO</label>&nbsp;&nbsp;
                    <input type="text" id="idno" name="idno" class="k-textbox" placeholder="N100704" required validationMessage="Enter ID Number" />
                </li>
		<li>
                    <label for="name" class="required">Name</label>&nbsp;&nbsp;
                    <input type="text" id="name" name="name" class="k-textbox" placeholder="ANONYMOUS" required validationMessage="Enter Name" />
                </li>
                <li>
                    <label for="password" class="required">Password</label>&nbsp;&nbsp;
                    <input type="password" id="password"  class="k-textbox" name="password" placeholder="SECRET" required validationMessage="Enter Password"/><span class="k-invalid-msg" data-for="password"></span>
                </li>
                <li>
                    <label for="cpassword" class="required">CPassword</label>&nbsp;&nbsp;
                    <input type="password" id="cpassword" class="k-textbox" name="cpassword"  placeholder="SECRET" required validationMessage="Cofirm Password"/><span class="k-invalid-msg" data-for="cpassword"></span>
                </li>
		<ul class=options>
                <li>
                    <label for="sq"><b>SQ</b></label>&nbsp;&nbsp;
                    <select name="sq" id="filter" required data-required-msg="Security Question" style='width:190px;height:30px;'>
						<option value=''>Security Question</option>
                        <option value='bf'>My Best Friend</option>
                        <option value='fb'>My Fav Book</option>
                        <option value='cn'>My Childhood Name</option>
                        <option value='nn'>My Nick Name</option>
                    </select>
                    <span class="k-invalid-msg" data-for="sq"></span>
                </li>
                <li>
                    <label for="sqa" class="required">Answer</label>&nbsp;&nbsp;
                    <input type="password" id="sqa" name="sqa" class="k-textbox" placeholder="Answer" required validationMessage="Answer" />
                </li>
                <li>
                    <label for="email" class="required">Email</label>&nbsp;&nbsp;
                    <input type="email" id="email" name="Email" class="k-textbox" placeholder="myname@mail.com"  required data-email-msg="Email format is not valid" />
                </li>
                
                <li  class="accept">
                    <input type="checkbox" name="Accept" required validationMessage="Acceptance is required" /> I accept the terms and condition of service
                </li>
                <li  class="accept">
                    <button class="k-button" type="submit">Submit</button>
                </li>
                <li class="status" style='color:green;'>
                </li>
            </ul>
        </div>

            <style scoped>

                .k-textbox {
                    width: 11.8em;
                }

                #tickets {
                    width: 510px;
                    height: 380px;
                    margin: px auto;
                    padding: 6px 16px 16px 130px;
                    background: url('') transparent no-repeat 0 0;
                }

                #tickets h3 {
                    font-weight: normal;
                    font-size: 1.4em;
                    border-bottom: 1px solid #ccc;
                }

                #tickets ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                }
                #tickets li {
                    margin: 10px 0 0 0;
                }

                label {
                    display: inline-block;
                    width: 120px;
                    text-align: right;
                }

                .required {
                    font-weight: bold;
                }

                .accept, .status {
                    padding-left: 90px;
                }

                .valid {
                    color: green;
                }

                .invalid {
                    color: red;
                }
                span.k-tooltip {
                    margin-left: 6px;
                }
            </style>

            <script>
                $(document).ready(function() {
                    var data = [
                    "12 Angry Men",
                    "Il buono, il brutto, il cattivo.",
                    "Inception",
                    "One Flew Over the Cuckoo's Nest",
                    "Pulp Fiction",
                    "Schindler's List",
                    "The Dark Knight",
                    "The Godfather",
                    "The Godfather: Part II",
                    "The Shawshank Redemption"
                    ];

                    $("#search").kendoAutoComplete({
                        dataSource: data,
                        separator: ", "
                    });

                    $("#time").kendoDropDownList({
                        optionLabel: "--Start time--"
                    });

                    $("#amount").kendoNumericTextBox();

                    var validator = $("#tickets").kendoValidator().data("kendoValidator"),
                    status = $(".status");

                    $("button").click(function() {
                        if (validator.validate()) {
							var id=$("#idno").val();
							var name=$("#name").val();
							var pwd=$("#password").val();
							var cpwd=$("#cpassword").val();
							var sq=$("#filter").val();
							var sqa=$("#sqa").val();
							var email=$("#email").val();
							status.text("Loading...");
							$.post("registerme.php?id="+id+"&name="+name+"&pwd="+pwd+"&cpwd="+cpwd+"&sq="+sq+"&sqa="+sqa+"&email="+email,function(data){
								 status.text(data)
                              
								});
                           
                        } else {
                            status.text("Oops! There is invalid data in the form.")
                               
                             $("html, body").animate({ scrollTop: 0 }, 1000);
                        }
                    });
                });
            </script>
                        <script>
                $(document).ready(function() {
                  

                  
                    $("#filter").kendoDropDownList({
                        change: filterTypeOnChanged
                    });

                 

                    function filterTypeOnChanged() {
                        combobox.options.filter = $("#filter").val();
                    }
                });
           </script>

        </div>
</td></tr></table>
</body>
</html>
