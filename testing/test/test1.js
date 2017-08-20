var assert =require('chai').assert;
var first =require('../sum');
var second =require('../tot');

describe('Calculate total sum',function(){
	it('this shoud return sum',function(){
		assert.equal(first(),45);
	});
});
describe('This shoud return a list',function(){
	it('this shoud return sum',function(){
		assert.equal(second(),6);
	});
});
describe('This shoud return current date',function(){
	it('this shoud current date',function(){
		assert.equal(second(),6);
	});
});