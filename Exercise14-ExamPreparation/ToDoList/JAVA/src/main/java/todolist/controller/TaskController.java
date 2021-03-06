package todolist.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import todolist.bindingModel.TaskBindingModel;
import todolist.entity.Task;
import todolist.repository.TaskRepository;

import java.util.List;

@Controller
public class TaskController {

    @Autowired
    private TaskRepository taskRepository;

    @GetMapping("/")
    public String index(Model model) {
        List<Task> tasks = this.taskRepository.findAll();
        model.addAttribute("view", "task/index");
        model.addAttribute("tasks", tasks);
        return "base-layout";
    }

    @GetMapping("/create")
    public String create(Model model) {
        model.addAttribute("view", "task/create");
        return "base-layout";
    }

    @PostMapping("/create")
    public String createProcess(TaskBindingModel taskBindingModel) {
        Task task = new Task(
                taskBindingModel.getTitle(),
                taskBindingModel.getComments()
        );
        this.taskRepository.saveAndFlush(task);
        return "redirect:/";
    }

    @GetMapping("/delete/{id}")
    public String delete(Model model, @PathVariable int id) {
        if (!this.taskRepository.exists(id)) return "redirect:/";
        Task task = this.taskRepository.findById(id);
        model.addAttribute("view", "task/delete");
        model.addAttribute("task", task);
        return "base-layout";
    }

    @PostMapping("/delete/{id}")
    public String deleteProcess(Model model, @PathVariable int id) {
        if (!this.taskRepository.exists(id)) return "redirect:/";
        Task task = this.taskRepository.findById(id);
        this.taskRepository.delete(task);
        return "redirect:/";
    }
}
