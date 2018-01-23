const Project = require('../models/Project');

module.exports = {
    index: (req, res) => {
	    Project.find().then(projects => {
		    res.render('project/index', {'projects': projects});
	    });
    },
    createGet: (req, res) => {
	    res.render('project/create');
    },
    createPost: (req, res) => {
	    let project = req.body;
	    Project.create(project).then(project => {
		    res.redirect("/");
	    }).catch(err => {
		    project.error = 'Please fill in all fields with valid data!';
		    res.render('project/create', project);
	    });
    },
    editGet: (req, res) => {
	    let id = req.params.id;
	    Project.findById(id).then(project => {
		    if (project) {
			    res.render('project/edit', project);
		    }
		    else {
			    res.redirect('/');
		    }
	    }).catch(err => res.redirect('/'));
    },
    editPost: (req, res) => {
	    let id = req.params.id;
	    let project = req.body;
	    Project.findByIdAndUpdate(id, project).then(project => {
		    res.redirect('/');
	    }).catch(err => {
		    project.id = id;
		    project.error = 'Please fill in all fields with valid data!';
		    return res.render('project/edit', project);
	    });
    },
    deleteGet: (req, res) => {
	    let id = req.params.id;
	    Project.findById(id).then(project => {
		    if (project) {
			    return res.render('project/delete', project);
		    }
		    else {
			    return res.redirect('/');
		    }
	    }).catch(err => res.redirect('/'));
    },
    deletePost: (req, res) => {
	    let id = req.params.id;
	    Project.findByIdAndRemove(id).then(project => {
		    res.redirect('/');
	    }).catch(err => res.redirect('/'));
    }
};