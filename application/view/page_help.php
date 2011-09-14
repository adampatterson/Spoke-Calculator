<? $this->load->view('template_header', array( 'title'=>'Help' )); ?>
<div class="column span-21 last content-section">
  <div class="span-21">
    <div class="span-10">
      <h2>Table Of Contents</h2>
      <ol>
        <li><a href="#anchor1">Enter the Effective Rim Diameter (ERD)</a></li>
        <li><a href="#anchor2">Enter the Hub Flange Diamete</a></li>
        <li><a href="#anchor3">Enter the Hub Center To Flange Center Dimension</a></li>
        <li><a href="#anchor4">Choose the Number of Spokes</a></li>
        <li><a href="#anchor5">Choose the Number of Crosses</a></li>
      </ol>
    </div>
    <div class="span-10 prepend-1 last">
      <h2>Tools</h2>
      <ul>
        <li>Metric Calipers</li>
        <li>Wheelsmith Rim Rods</li>
        <li>Ruler</li>
        <li>Screwdriver</li>
      </ul>
    </div>
  </div>
  <div class="span-21"><a name="anchor1"></a>
    <p><strong>Step 1.</strong>Enter the Effective Rim Diameter (ERD)<a href="#top">(Back to top)</a></p>
    <div class="span-5"><img src="<?=BASE_URL; ?>assets/images/erd.png" alt="ERD" width="140" height="292" /></div>
    <div class="span-16 last">
      <p>The rim ERD can be measured simply with the Wheelsmith Rim  Rods but placing the two rods in either side of the rim so that they meet and  cross in the middle. The total overall length of the rods is 700mm. what you  would do then is measure the over lapping portion of the rod and minus it from  700 to give you ERD. if you don&rsquo;t have the wheelsmith Rim Rods then follow the  next 3 steps.</p>
      <ul>
        <li>Carefully measure the outside  diameter of the rim, from outside edge to outside edge, being careful  to measure exactly in the center across the rim. To be sure the rim is  round, measure in at least two locations 90 degrees apart. If the two  measurements are different, measure in a third location and average the  three measurements.</li>
        <li>Next, drop a spoke nipple into any hole in the rim. Using the  depth gauge of the measuring caliper, measure from the top edge of the  rim to the base of the screwdriver slot of the nipple. This represents  where the end of the spoke should be when the wheel is fully tensioned.</li>
        <li>Using the measurement obtained in step 2, multiply the result  by 2 and subtract that number from the measurement obtained in step 1  (the outside rim measurement). The result will be the Effective Rim  Diameter (ERD).</li>
      </ul>
    </div>
  </div>
  <div class="span-21"><a name="anchor2"></a>
    <p><strong>Step 2.</strong>Enter the Hub Flange Diameter<a href="#top">(Back  to top)</a></p>
  </div>
  <div class="span-21"><a name="anchor3"></a>
    <div class="span-5"><img src="<?=BASE_URL; ?>assets/images/fd.png" alt="Flange Diamiter" width="169" height="146" /></div>
    <div class="span-16 last">
      <p>This is the measurement in millimeters from the center of one spoke hole to another on the opposite side.</p>
    </div>
  </div>
  <div class="span-21">
    <div class="span-16 last">
      <p><strong>Step 3.</strong>Enter the Hub Center To Flange Center Dimension<a href="#top">(Back to top)</a></p>
    </div>
  </div>
  <div class="span-6"><img src="<?=BASE_URL; ?>assets/images/cf.png" alt="Center To Flange" width="222" height="152" /></div>
  <div class="span-15 last">
    <p>You must first measure the overall axle length; a standard Mountain  bike will be 135. Take that number and divide it by 2 giving you your center of  67.5. Now from the center of the hub measure to the left flange. This will give  you the left center to flange. Repeat for the right side. This method is good  to use because you can adjust the dish of the wheel. Some manufactures are  using a dishless rear wheel and they achieve this by making the rear end of the  bike out of symmetry. Giving you a stronger rear wheel. All you would need to  do for this is compensate in you center point of the hub.</p>
    <p>Another way to easily measure the  center to flange is by measuring from the axle to the center of the  flange then subtract that number from half of the overall axle  length. for example your hub has an axle length of 135mm divide that  by 2 gives you 67.5 and if we measure from the center of the flange  to the axle and get say 25 we would then minus 25 from 67.5 giving us  42.5</p>
  </div>
</div>

<div class="span-21"><a name="anchor4"></a>
  <p><strong>Step 4. </strong>Choose the Number of Spokes<a href="#top"> (Back to top)</a></p>
  <p>This is the number of holes that are in the hub or the rim even if you are finding the length of only one side of the hub.</p>
</div>
<div class="span-21"><a name="anchor5"></a>
  <p><strong>Step 5. </strong>Choose the Number of Crosses<a href="#top"> (Back to top)</a></p>
  <p>This is how many times a spoke will intersect another spoke.  The standard mountain bike wheel is a 3 cross were as the standard BMX wheel is  a 4 cross. More crosses  create a longer spoke, more tangent spoke, and more torsionally  efficient wheel. Less crosses require a shorter spoke, but is less  torsionally efficient.</p>
</div>
</div>
<? $this->load->view('template_footer'); ?>
