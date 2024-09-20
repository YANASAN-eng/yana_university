package modules;

import java.util.*;

public class TopologicalSort {
    /** 頂点数と隣接リストの組 */
    public Map<Integer, List<Integer>> graph;
    /** 頂点数 */
    public int v_num;
    // コンストラクタ
    public TopologicalSort(Map<Integer, List<Integer>> graph, int v_num) {
        this.graph = graph;
        this.v_num = v_num;
    }
    // トポロジカルソート(Kahn's Algorism)
    public List<Integer> topologicalSort() throws Exception {
        /** 各頂点の入力次数を格納 */
        int[] inDegree = new int[this.v_num];
        /** ソートされた頂点を格納 */
        List<Integer> result = new ArrayList<>();
        /** グラフの隣接リストから入次数を計算 */
        for (int node: graph.keySet()) {
            for (int neighbor: graph.get(node)) {
                inDegree[neighbor]++;
            }
        }
        /** 入次数が0の頂点をキューに追加 */
        Queue<Integer> queue = new LinkedList<>();
        for (int i = 0; i < this.v_num; i++) {
            if (inDegree[i] == 0) {
                queue.add(i);
            }
        }
        /** 以下帰納的に処理を繰り返す */
            /** 
             * キューの中身をresultにキューから追加し削除
             * いずれはこの処理は止まる。
             */
        while (!queue.isEmpty()) {
            int node = queue.poll();
            result.add(node);
            /** 隣接する頂点の次数を減らし、ゼロになればキューに追加 */
            if (graph.containsKey(node)) {
                for (int neighbor: graph.get(node)) {
                    inDegree[neighbor]--;
                    if (inDegree[neighbor] == 0) {
                        queue.add(neighbor);
                    }
                }
            }
        }
        if (result.size() != this.v_num) {
            throw new Exception("入力されたグラフには閉路が存在します。");
        }
        return result;
    }
}