Sequence number project
=======

A Symfony project created on February 11, 2019, 9:49 am.

#### first run composer and bower to install all needed dependencies
###### composer install bower install

### to run the application first run the server
####### php bin/console server:start 0.0.0:{port}

### to run the application from console run the following
####### php bin/console run

#### tu run the test run the below command from your terminal
#######  vendor/bin/phpunit tests/AppBundle/Model/SquenceModelTest.php


##Description
Dany jest ciąg liczb a​i​, ​i​ = 0, 1, 2, ..., 
zdefiniowany przez warunki a​0​ = 0 a​1​ = 1 a​2i​ = ​a​i a​2i+1​ = ​a​i​ + ​a​i+1 
dla każdego i​ = 1, 2, 3, ... 
Wejście: Na wejściu, program otrzyma zestaw test case'ów, nie więcej niż 10 jednocześnie. Każdy test case znajduje się w osobnej linii i zawiera liczbę ​n ​(1 ≤ ​n ​≤ 99 999). 
Wyjście: Dla każdego ​n​ wypisz maksymalną znalezioną wartość. 
 
###EXAMPLE 
##### input output 
#####           5      10 
#####           3      4 
