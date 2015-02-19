var app = app || {};
console.log($('#item-template').html());
app.TodoView = Backbone.View.extend({
	tagName: 'li',
	template: _.template($('#item-template').html()),
	events: {
		'dblclick label': 'edit',
		'keypress .edit': 'updateOnEnter',
		'blur .edit': 'close'
	},
	initialize: function() {
		this.listenTo(this.model, 'change', this.render);
	},
	edit: function() {
		this.$el.addClass('editing');
		this.$input.focus();
	},
	close: function() {
		var value = this.$input.val().trim();
		if (value) {
			this.model.save({title: value});
		}
		this.$el.removeClass('editing');
	},
	updateOnEnter: function(e) {
		if(e.which === ENTER_KEY) {
			this.close();
		}
	}
});