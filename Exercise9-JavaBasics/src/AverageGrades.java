import java.util.*;

public class AverageGrades {

    public static void main(String[] args) {
        List<Student> register = new ArrayList<Student>();
        Scanner scan = new Scanner(System.in);
        int studentCount = scan.nextInt();
        scan.nextLine();
        for (int s = 1; s <= studentCount ; s++) {
            String[] studentData = scan.nextLine().split(" ");
            String name = studentData[0];
            double[] grades = Arrays.stream(studentData).skip(1)
                    .mapToDouble(Double::parseDouble).toArray();
            register.add(new Student(name, grades));
        }
        register.stream().filter(student -> student.getAverageGrade() >= 5.00)
            .sorted((student1, student2) -> {
                int result = student1.getName().compareTo(student2.getName());
                if (result == 0)
                    result = Double.compare(student2.getAverageGrade(), student1.getAverageGrade());
                return result;
            })
            .forEach(student -> {
                System.out.printf("%s -> %.2f%n", student.getName(), student.getAverageGrade());
            });
        }

    public static class Student {
        private String name;

        public String getName() {
            return name;
        }

        public void setName(String name) {
            this.name = name;
        }

        private double[] grades;

        public double[] getGrades() {
            return grades;
        }

        public void setGrades(double[] grades) {
            this.grades = grades;
        }

        private double averageGrade;

        public double getAverageGrade() {
            return averageGrade;
        }

        public void setAverageGrade(double averageGrade) {
            this.averageGrade = averageGrade;
        }

        public Student(String name, double[] grades) {
            this.name = name;
            this.grades = grades;
            this.averageGrade = Arrays.stream(grades).average().getAsDouble();
        }
    }
}
