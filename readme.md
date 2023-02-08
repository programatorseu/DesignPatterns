# Design Pattern 

- mess to difficult to follow and maintain
- It offers template to work with 

=> **creational patterns**

=> **structural patterns**

=> **behavior patterns**


### 1. Creatonal Patterns

### 1.1 Factory

- abstract process of creating object 

> we have app that needs some config settings 
>
> we have `DatabaseConfig` class and then we create  `JsonConfig` class 
>
> - they both have simillar look

create `ConfigFactory` with `@create` method that will return config that use want to use 



### 1.2 Singleton

 class with only a single instance .

class supply instance 



**requirements**

- we can not subclass (we violates rule) - needs to final
- need private constructor ( we do not create object outside the class ) - does not have any param



> create DB class 
>
> - `private $db` initialized to null
> - access instnace - need static function `Instance`  - we can call whatever we want
> - static variable  - to store our instance (initiliazed to null)  ? create instnace 



**issues**

- hard to test within(we introdcude global state )
- we add global state to our APP!





## 2. Structural Patterns

### 2.1 Adapter

> we write software adapter we can use 2 incompatible APIS 

we have class that comes from library 

- `@makePayment` where we pass amount of money we want to pay. That method come from external provider
- then after some time we are going to use different provider so we would need to change it 

Adapter starts with `interface` that will consolidate 2 different payment gateways to unified adapter !

- adater implements that interface  
  - dependency injection of  other class we are going to use it 
  - implement method to call designed method 





### 2.2 Composite

tree - like structures

directory - **branches**

files - **leaves**

we have 2 types of objects  in tree structure 

reading file has nothing to commont with getting file from directory

composite tell that it should be the same type 



- abstract class 



### 2.3 Decorator

add functionality without modifying object 

allow to write more simple class 

we have `Circle` class . then we create `BorderCircle` class that add border to circle

then we want to create `RedCircle` and it extends `RedBorderCircle` ? 



- start with Interface 
  - 1 method in our case `@draw`
- create class that implements interface (implement `@draw` method)
- abstract class `Decorator` that implements interface 
  - inside `construct` that creates `Shape` object 
  - call `draw` method








### 2.4 Facade

take processes and hide them within class 

we can sum up working on web store : 

- check inventory ( if there is item)

- user pays
- ship the item (choose)
- place Order

we are going to create class for every parts 




## 3. Behavioural Pattern

### 3.1 Chain of Responsibility

other names : chain of command pattern

- we have chain of handlers to process something 
- we have request (will be processed )

**middleware** (pipeline) implements Chain of Responsibility 

- check request could be processed further  

**steps**

1) abstract class `log type` with constants
   - constructor injection inside `AppLog`



### 3.2 Command 

- create command
- execute command

`command` encapsulate functionality 

decoupling functionality from receiver and requester 

- `receiver` is going to receive command
- `invoker/requester` - issue a command (does not know what comamnd is and does - just execute command ! )

whole is all about interface `Command` 

 we will have Televsion class which is receiver. 

Remote is `invoker`

we can command as many command we want 



### 3.3 Observer Pattern

Observer is a common pattern in UIs, 

- where components need to update in  response to input events or real-time changes elsewhere.

 we have 2 things

 `observable` object (sth is going to happend)

`observer` object (obserwujacy `observable`) `observable` notify `observer`



> shopping cart 
>
> - shopping cart is goinb to be `observable` object notify shopping cart log
> - shopping cart log - `observer` object. 
> - they are `decoupled` ! 

form relationship between 2 objects () `method injection`

 

### 3.4 Strategy Pattern

- pozwala change functionality or behaviour of an object at run time 

mamy NameListClass and we want to serialize. There are different method of serialize

we can write method to export to different format (json, xml i tak dalej)

wiecej formatow - more functions

we can extract those all functionality into seperate class. - SOLID principle :) 




