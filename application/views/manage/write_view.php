<div id="head_img">
    	<div class="head_img_inner">
			<div class="head_text">
				<p><img src="/assets/images/bi2.png" alt="" align="middle"/></p>
                <p class="sub_text">Making a good news<br>
                <p class="bt_company_more"><a href="/Intro"></a></p>
			</div>
        </div>   
    </div>

    <form method="post" action="/Manage/make_news" name="write_form" id="write_form" onsubmit="return write_news()">    
    <div id="container2">
    	<div class="container2_inner">
        	<div class="s_title">News</div>
            <div>
            <table width="1020" border="1" cellspacing="0" cellpadding="0" bordercolor="#e4e4e4">
				<tr>
					<td width="158" height="60" class="text1"><span class="text1_r">*</span> 제목</td>
					<td width="350" class="text2"><input name="news_title" style="line-height:40px; width:800px;" type="text" class="input1" id="news_title" /></td>
					
				</tr>
	        </table>
            </div>
			
            <div>
            	<textarea name="news_content" id="news_content" class="textarea2" cols="40" style="height:400px"></textarea>
            </div>
		</br>
		<div class="bt_ok"><input TYPE="IMAGE" src="/assets/images/bt_ok.png" width="96" height="49" align="middle" name="submit" value="submit"></div>
		</div>
    </div>
    </div>
    </form>