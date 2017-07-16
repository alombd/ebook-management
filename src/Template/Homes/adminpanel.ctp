<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    
    background-color: #1c1c1c;
   float: left;
  
    overflow: auto;
    width: 300px;
}

li a {
    display: block;
    color: #fff;
    padding: 8px 16px;
    text-decoration: none;
    border-bottom: 1px #595959 solid;
}

li a.active {
    background-color: green;
    color: white;
}

li a:hover:not(.active) {
    background-color: green;
    color: white;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
}
.logout{
  float: right;
   /*background-color: #d4e5e5;*/
  margin-right: 20px;
  color: #fff;

}
.logout a{
  color: #fff;
 }
</style>
</head>
<body>
  <div style="overflow:hidden; background:#595959;">

<div  class="logout">
 
    <h3>
    <?= $this->Html->link(__( 'Logout'), ['controller' =>'Users','action' => 'logout']) ?>
    </h3>
  </div>

  </div>
  <div class="mmenu" style="overflow:hidden; background:#595959; padding:30px 0px 0px 0px;">

<ul>
   
   </ul>      
    
  </div>
<div style="overflow:hidden">
<ul>
 
         <li><?= $this->Html->link(__('Users Table'), ['controller' =>'Users','action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('My Profile'), ['controller' =>'Users','action' => 'myprofile']) ?></li>
        

        <li><?= $this->Html->link(__('User Profile'), ['controller' =>'UserProfiles','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__( 'Book Menu '), ['controller' =>'BookMenus','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__( 'Customer Table '), ['controller' =>'CustomerTable','action' => 'index']) ?></li>
</ul>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  

  <h2>Admin Panel</h2>
 <p>The premier technical journal focused on the theory, techniques and practice for extracting information from large databases

    The premier technical journal focused on the theory, techniques and practice for extracting information from large databases.
    Publishes original technical papers in both the research and practice of data mining and knowledge discovery, surveys and tutorials of important areas and techniques, and detailed descriptions of significant applications.

The premier technical publication in the field, Data Mining and Knowledge Discovery is a resource collecting relevant common methods and techniques and a forum for unifying the diverse constituent research communities.

The journal publishes original technical papers in both the research and practice of data mining and knowledge discovery, surveys and tutorials of important areas and techniques, and detailed descriptions of significant applications.

Coverage includes:

- Theory and Foundational Issues

- Data Mining Methods

- Algorithms for Data Mining

- Knowledge Discovery Process

- Application Issues.

Related subjects » Artificial Intelligence - Database Management & Information Retrieval - Physical & Information Science
Abstracted/Indexed in

Science Citation Index, Science Citation Index Expanded (SciSearch), Journal Citation Reports/Science Edition, SCOPUS, INSPEC, Zentralblatt Math, Google Scholar, EBSCO Discovery Service, CSA, ProQuest, Academic OneFile, ACM Digital Library, Computer Abstracts International Database, Computer Science Index, CSA Environmental Sciences, Current Contents/Engineering, Computing and Technology, Current Index to Statistics, DBLP, EI-Compendex, Expanded Academic, io-port.net, Mathematical Reviews, OCLC, Referativnyi Zhurnal (VINITI), SCImago, STMA-Z, Summon by ProQuest
</p>
</div>
</div>
</body>
</html>