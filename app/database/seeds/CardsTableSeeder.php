<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CardsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
		}
			/*Card::create([
				'question' => $faker->sentence(3),
				'answer' => $faker->sentence(3),
				'topic_id' => rand(1, 40),
				'exam_id' => rand(1, 10)
			]);*/

			Card::create([
				'question' => 'Provide an interface for creating families of related or dependent objects without specifying their concrete classes.',
				'answer' => 'Abstract Factory',
				'topic_id' => 201,
				'exam_id' => 100
			]);

			Card::create([
				'question' => 'Separate the construction of a complex object from its representation so that the same construction process can create different representations.',
				'answer' => 'Builder',
				'topic_id' => 201,
				'exam_id' => 100
			]);


			Card::create([
				'question' => 'Define an interface for creating an object, but let subclasses decide which class to instantiate. Lets a class defer instantiation to subclasses.',
				'answer' => 'Factory Method',
				'topic_id' => 201,
				'exam_id' => 100
			]);


			Card::create([
				'question' => 'Specify the kinds of objects to create using a prototypical instance, and create new objects by copying this prototype.',
				'answer' => 'Prototype',
				'topic_id' => 201,
				'exam_id' => 100
			]);


			Card::create([
				'question' => 'Ensure a class only has one instance, and provide a global point of access to it.',
				'answer' => 'Singleton',
				'topic_id' => 201,
				'exam_id' => 100
			]);


			Card::create([
				'question' => "Convert the interface of a class into another interface clients expect. Lets classes work together that couldn't otherwise because of incompatible interfaces.",
				'answer' => 'Adapter',
				'topic_id' => 202,
				'exam_id' => 100
			]);


			Card::create([
				'question' => "Decouple an abstraction from its implementation so that the two can vary independently.",
				'answer' => 'Bridge',
				'topic_id' => 202,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Compose objects into tree structures to represent part-whole hierarchies. Lets clients treat individual objects and compositions of objects uniformly.",
				'answer' => 'Composite',
				'topic_id' => 202,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Attach additional responsibilities to an object dynamically. Provide a flexible alternative to subclassing for extending functionality.",
				'answer' => 'Decorator',
				'topic_id' => 202,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Provide a unified interface to a set of interfaces in a subsystem. Defines a higher-level interface that makes the subsystem easier to use.",
				'answer' => 'Facade',
				'topic_id' => 202,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Use sharing to support large numbers of fine-grained objects efficiently.",
				'answer' => 'Flyweight',
				'topic_id' => 202,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Provide a surrogate or placeholder for another object to control access to it.",
				'answer' => 'Proxy',
				'topic_id' => 202,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Avoid coupling the sender of a request to its receiver by giving more than one object a chance to handle the request. Chain the receiving objects and pass the request along the chain until an object handles it.",
				'answer' => 'Chain of Responsibility',
				'topic_id' => 203,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Encapsulate a request as an object, thereby letting you parameterize clients with different requests, queue or log requests, and support undoable operations.",
				'answer' => 'Command',
				'topic_id' => 203,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Given a language, define a represention for its grammar along with an interpreter that uses the representation to interpret sentences in the language.",
				'answer' => 'Interpreter',
				'topic_id' => 203,
				'exam_id' => 100
			]);


			Card::create([
				'question' => "Provide a way to access the elements of an aggregate object sequentially without exposing its underlying representation",
				'answer' => 'Iterator',
				'topic_id' => 203,
				'exam_id' => 100
			]);


			Card::create([
				'question' => "Define an object that encapsulates how a set of objects interact. Promotes loose coupling by keeping objects from referring to each other explicitly, and it lets you vary their interaction independently.",
				'answer' => 'Mediator',
				'topic_id' => 203,
				'exam_id' => 100
			]);


			Card::create([
				'question' => "Without violating encapsulation, capture and externalize an object's internal state so that the object can be restored to this state later",
				'answer' => 'Memento',
				'topic_id' => 203,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Define a one-to-many dependency between objects so that when one object changes state, all its dependents are notified and updated automatically.",
				'answer' => 'Observer',
				'topic_id' => 203,
				'exam_id' => 100
			]);


			Card::create([
				'question' => "Allow an object to alter its behavior when its internal state changes. The object will appear to change its class.",
				'answer' => 'State',
				'topic_id' => 203,
				'exam_id' => 100
			]);


			Card::create([
				'question' => "Define a family of algorithms, encapsulate each one, and make them interchangeable. Lets the algorithm vary independently from clients that use it.",
				'answer' => 'Strategy',
				'topic_id' => 203,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Define the skeleton of an algorithm in an operation, deferring some steps to subclasses. Lets subclasses redefine certain steps of an algorithm without changing the algorithm's structure.",
				'answer' => 'Template Method',
				'topic_id' => 203,
				'exam_id' => 100
			]);

			Card::create([
				'question' => "Represent an operation to be performed on the elements of an object structure. Lets you define a new operation without changing the classes of the elements on which it operates.",
				'answer' => 'Visitor',
				'topic_id' => 203,
				'exam_id' => 100
			]);

	}

}