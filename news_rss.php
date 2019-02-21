<?php
class RSSParser21 {
   var $count = 0;
   var $insideitem = false;
   var $tag = "";
   var $title = "";
   var $description = "";
   var $link = "";
   var $pubDate = "";
   var $source = "";

   function startElement1($parser, $tagName, $attrs) {
       if ($this->insideitem) {
           $this->tag = $tagName;
       } elseif ($tagName == "ITEM") {
           $this->insideitem = true;
           $this->count= 1+$this->count;
       }

   }

   function endElement1($parser, $tagName) {

       if ($tagName == "ITEM" &&  $this->count < 4) {

  
   		$newsDescription = $this->description;		
		
		if(strpos($newsDescription,"<img"))
		{
			$newsDescription = substr($newsDescription,0,strpos($newsDescription,"<img"));
		}
		if(strlen(htmlspecialchars(trim($newsDescription))) > 50)
		{
			$newsDescription = substr(htmlspecialchars(trim($newsDescription)),0,50)."...";
		}
			
		$localDate = date("j F", strtotime($this->pubDate));
								
								//printf($localDate);
		?>
		<div class="leftBarNews">
		<span class="leftBarNewsHead"><a href="<?php echo trim($this->link); ?>" target="_parent"><?php echo htmlspecialchars(trim($this->title)); ?></a></span>
		<span class="leftBarNewsText"><?php echo $newsDescription; ?></span>
		<span class="leftBarNewsOrange"><?php echo $this->source; ?>,&nbsp;</span><span class="leftBarNewsText"><?php echo $localDate; ?></span> </div>
		
                   <?php /*?><table  cellpadding='0' cellspacing='0'  border="0">
                                <?if (strlen(htmlspecialchars(trim($this->description))) > 50)
                                {?>
                                <tr valign='top'>
                                <td class='layer_table2' width='100%'>
                                <?
								//printf($this->pubDate);
								$localDate = date("j F", strtotime($this->pubDate));
								
								printf($localDate);
								
								 printf("<b><a  href='%s'><font class='linkcolor'  size='2'>%s </font></a></b>",
                                                   trim($this->link),htmlspecialchars(trim($this->title)));?>
                                <br><div class='textcolor' style='padding-bottom:2px'><?=substr(htmlspecialchars(trim($this->description)),0,50);?> ...</div></td>
                                </tr>
                                <?}
                                else
                                {?>
                                <tr valign='top'>
                                <td class='layer_table2'width='100%'>
                                <?  printf("<b><a  href='%s'><font class='linkcolor'  size='2'>%s </font></a></b>",
                                                   trim($this->link),htmlspecialchars(trim($this->title)));?>
                                <br><div class='textcolor' style='padding-bottom:2px'><?=htmlspecialchars(trim($this->description));?></div></td>
                                </tr>
                                <?}?>
                        </table><?php */?>
<?

           $this->title = "";
           $this->description = "";
           $this->link = "";
		   $this->pubDate = "";
           $this->insideitem = false;

       }

   }

   function characterData1($parser, $data) {
       if ($this->insideitem) {
           switch ($this->tag) {
               case "TITLE":
               $this->title .= $data;
               break;
               case "DESCRIPTION":
               $this->description .= $data;
               break;
               case "LINK":
               $this->link .= $data;
               break;
			   case "PUBDATE":
			   $this->pubDate .= $data;
			   break;
           }
       }
   }
}
function displayRSS($link, $source){
	$xml_parser = xml_parser_create();
		$rss_parser = new RSSParser21();
		$rss_parser->source = $source;
		// xml_set_object($xml_parser,&$rss_parser);
    xml_set_object($xml_parser,$rss_parser);

		xml_set_element_handler($xml_parser, "startElement1", "endElement1");
		xml_set_character_data_handler($xml_parser, "characterData1");
		//$fp = fopen("http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/business/rss.xml","r")
		//   or die("Error reading RSS data.");
		$fp = fopen($link,"r") or die("Error reading RSS data.");
		while ($data = fread($fp,4096))
		   // xml_parse($xml_parser, $data, feof($fp))
			  //  or die(sprintf("XML error: %s at line %d",
				 //   xml_error_string(xml_get_error_code($xml_parser)),
				 //   xml_get_current_line_number($xml_parser)));

         xml_parse($xml_parser, $data, feof($fp))
         or die();

/*

sprintf("XML error: %s at line %d",
           xml_error_string(xml_get_error_code($xml_parser)),
           xml_get_current_line_number($xml_parser))

*/

		fclose($fp);
		xml_parser_free($xml_parser);

}
?>