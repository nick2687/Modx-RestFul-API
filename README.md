# Modx-RestFul-API
This is a sample configuration of the modx rest service available in 2.3+. Please note that this is a work in progress :)


##Included Controllers
- Content coming soon

##Available Functions
- Extend your controllers by overriding these public functions within them

##Available Options
The following options are used if the default get/put/post/delete methods are not overridden. They automate the display and manipulation of data based on the classKey that is specified on the controller class, allowing for quick and easy controller creation based on standard CRUD concepts.

- `public $classKey;` @var string $classKey The xPDO class to use
    
- `public $classAlias;` @var string $classAlias The alias of the class when used in the getList method
-  `public $defaultSortField = 'name';` @var string $defaultSortField The default field to sort by in the getList method 
    
-    `public $defaultSortDirection = 'ASC';` @var string $defaultSortDirection The default direction to sort in the getList method 
    
-    `public $defaultLimit = 20;` @var int $defaultLimit The default number of records to return in the getList method 
    
-    `public $defaultOffset = 0;`  @var int $defaultOffset The default offset in the getList method
    
-    `public $object;` @var xPDOObject $object
 
-    `public $searchFields = array();`    @var array $searchFields Optional. An array of fields to use when the search parameter is passed
