package teistermask.bindingModel;

import javax.validation.constraints.NotNull;

public class TaskBindingModel {

	@NotNull
    private String title;

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	@NotNull
	private String status;

	public String getStatus() {
		return status;
	}

	public void setStatus(String status) {
		this.status = status;
	}
}
