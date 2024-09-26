package modules;

import java.util.function.Function;
import java.util.ArrayList;
import java.util.List;

public class Layer {
    /** 重み*/
    public Node[][] W;
    /** バイアス */
    public Node[] b;
    /** 関数列 */
    public List<Function<Node, Node>> fs;

    /** コンストラクタ */
    public Layer(double[][] W, double[] b){
        this.W = new Node[W.length][W[0].length];
        for (int i = 0; i < W.length; i++) {
            for (int j = 0; j < W[0].length; j++) {
                this.W[i][j] = new Node();
                this.W[i][j].value = W[i][j];
            }
        }
        this.b = new Node[b.length];
        for (int i = 0; i < b.length; i++) {
            this.b[i] = new Node();
            this.b[i].value = b[i];
        }
        this.fs = new ArrayList<>();
        for (int i = 0; i < b.length; i++) {
            this.fs.add(Functions.identity);
        } 
    }
    public Layer(double[][] W, double[] b, List<Function<Node, Node>> fs) {
        this.W = new Node[W.length][W[0].length];
        for (int i = 0; i < W.length; i++) {
            for (int j = 0; j < W[0].length; j++) {
                this.W[i][j] = new Node();
                this.W[i][j].value = W[i][j];
            }
        }
        this.b = new Node[b.length];
        for (int i = 0; i < b.length; i++) {
            this.b[i] = new Node();
            this.b[i].value = b[i];
        }
        this.fs = new ArrayList<>();
        for (Function<Node, Node> f : fs) {
            this.fs.add(f);
        }
    }
    public void showChildren() {
        for (int i = 0; i < this.W.length; i++) {
            for (int j = 0; j < this.W[0].length; j++) {
                for (Node child : this.W[i][j].children) {
                    System.out.println("W[" + i + "][" + j + "]: " + child.id);
                }
            }
        }
        for (int i = 0; i < this.b.length; i++) {
            for (Node child : this.b[i].children) {
                System.out.println("b[" + i + "]: " +  child.id);
            }
        }
    }
}